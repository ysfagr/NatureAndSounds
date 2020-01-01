<?php

namespace App\Http\Requests;

use Symfony\Component\HttpKernel\Exception\HttpException;

class FavoriteSoundStoreRequest extends FavoriteSoundRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @throws \HttpException
     * @throws \Exception
     *
     * @return array
     */
    public function rules()
    {
        if ($this->isSoundAlreadyAddedToFavorites($this->route('sound'))) {
            throw new HttpException(400, trans('exception.sound_already_added_favorites'));
        }

        return [];
    }
}

