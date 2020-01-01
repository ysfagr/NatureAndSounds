<?php

namespace App\Transformers;

use App\Version;
use League\Fractal\TransformerAbstract;

class VersionTransformer extends TransformerAbstract
{
    /**
     * @param Version $version
     *
     * @return array
     */
    public function transform(Version $version)
    {
        return [
            'id'                    => $version->id,
            'platform'              => $version->platform,
            'version_code'          => $version->version_code,
            'language_version_code' => $version->language_version_code,
            'force_update'          => $version->force_update,
        ];
    }
}

