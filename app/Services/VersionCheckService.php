<?php

namespace App\Services;

use App\Version;
use Illuminate\Database\Eloquent\Model;

class VersionCheckService
{
    private $platform;

    private $versionCode;

    private $languageVersionCode;

    /**
     * VersionCheckService constructor.
     *
     * @param $platform
     * @param $versionCode
     * @param $languageVersionCode
     */
    public function __construct($platform, $versionCode, $languageVersionCode)
    {
        $this->platform = $platform;
        $this->versionCode = $versionCode;
        $this->languageVersionCode = $languageVersionCode;
    }

    /**
     * Newest version by platform.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function newestVersion()
    {
        return Version::query()->where('platform', $this->platform)
            ->where('version_code', '>', $this->versionCode)->first();
    }

    /**
     * Newest lang version by platform.
     *
     * @return Model
     */
    public function newestLanguageVersion()
    {
        return Version::query()->where('platform', $this->platform)
            ->where('language_version_code', '>', $this->languageVersionCode)->first();
    }
}

