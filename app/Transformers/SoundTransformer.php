<?php

namespace App\Transformers;

use App\Sound;
use League\Fractal\TransformerAbstract;

class SoundTransformer extends TransformerAbstract
{
    /**
     * @param Sound $sound
     *
     * @return array
     */
    public function transform(Sound $sound)
    {
        return [
            'id'             => $sound->id,
            'name'           => $sound->name,
            'length'         => $sound->length,
            'artist_name'    => $sound->artist_name,
            'category_id'    => $sound->category_id,
            'sound_file_url' => $sound->sound_file_url,
        ];
    }
}

