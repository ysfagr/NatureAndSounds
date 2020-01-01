<?php

namespace App\Http\Controllers;

use App\Http\Requests\VersionCheckRequest;
use App\Http\Requests\VersionStoreRequest;
use App\Services\VersionCheckService;
use App\Transformers\VersionTransformer;
use App\Version;
use Cache;
use Dingo\Api\Http\Response;

class VersionController extends Controller
{
    
    /**
     * List all versions without pagination.
     *
     * @return Response
     */
    public function index(): Response
    {
        $versions = Version::orderByDesc('id')->get();

        return $this->response->collection($versions, new VersionTransformer());
    }

    /**
     * @param VersionStoreRequest $request
     *
     * @return Response
     */
    public function store(VersionStoreRequest $request): Response
    {
        $version = Version::create($request->all());

        return $this->response->item($version, new VersionTransformer());
    }

    /**
     * @param Version $version
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy(Version $version)
    {
        $version->delete();

        return $this->response->noContent();
    }

    /**
     * Version check for mobile applications.
     *
     * @param VersionCheckRequest $request
     *
     * @return array
     */
    public function check(VersionCheckRequest $request): array
    {
        $versionCheckService = new VersionCheckService(
            $request->platform,
            $request->version_code,
            $request->language_version_code
        );

        // Cache version check by request
        return Cache::remember('version_'.$request->platform.'_'.$request->version_code
            .'_'.$request->language_version_code, 60, function () use ($versionCheckService) {
                $forceUpdate = false;
                $appUpdateRequired = false;
                $languageUpdateRequired = false;

                $newestVersion = $versionCheckService->newestVersion();
                $newestLangVersion = $versionCheckService->newestLanguageVersion();

                if ($newestVersion) {
                    $appUpdateRequired = true;
                    $forceUpdate = $newestVersion->force_update;
                }

                if ($newestLangVersion) {
                    $languageUpdateRequired = true;
                }

                return [
                    'data' => [
                        'app_update_required'      => $appUpdateRequired,
                        'language_update_required' => $languageUpdateRequired,
                        'force_update'             => $forceUpdate,
                    ],
                ];
            });
    }
}
