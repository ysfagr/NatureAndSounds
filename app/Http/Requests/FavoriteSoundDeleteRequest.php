<?php

namespace App\Http\Requests;

use Symfony\Component\HttpKernel\Exception\HttpException;

class FavoriteSoundDeleteRequest extends FavoriteSoundRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (!$this->isSoundAlreadyAddedToFavorites($this->route('sound'))) {
            throw new HttpException(400, trans('exception.sound_not_found_in_user_favorites'));
        }

        return [];
    }
}


