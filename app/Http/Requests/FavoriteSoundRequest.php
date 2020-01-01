<?php

namespace App\Http\Requests;

use App\Sound;

class FavoriteSoundRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        // Returns true because authentication controller by route middleware
        return true;
    }

    /**
     * Is sound already added or not.
     *
     * @param Sound $sound
     *
     * @return bool
     */
    public function isSoundAlreadyAddedToFavorites(Sound $sound): bool
    {
        return $this->user()->favoriteSounds()->where('sound_id', $sound->id)->exists();
    }
}


