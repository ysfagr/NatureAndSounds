<?php

namespace App\Http\Controllers\Self;

use App\Http\Controllers\Controller;
use App\Http\Requests\FavoriteSoundDeleteRequest;
use App\Http\Requests\FavoriteSoundStoreRequest;
use App\Sound;
use App\Transformers\SoundTransformer;
use Dingo\Api\Http\Response;
use Illuminate\Http\Request;

class FavoriteSoundController extends Controller
{
    /**
     * Add sound to favorites.
     *
     * @param FavoriteSoundStoreRequest $request
     * @param Sound                     $sound
     *
     * @return Response
     */
    public function store(FavoriteSoundStoreRequest $request, Sound $sound): Response
    {
        $request->user()->favoriteSounds()->attach($sound);

        return $this->response->created();
    }

    /**
     * Delete sound from favorites.
     *
     * @param FavoriteSoundDeleteRequest $request
     * @param Sound                      $sound
     *
     * @return Response
     */
    public function destroy(FavoriteSoundDeleteRequest $request, Sound $sound): Response
    {
        $request->user()->favoriteSounds()->detach($sound);

        return $this->response->noContent();
    }

    /**
     * Get user's favorite sounds with pagination.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $sounds = $request->user()->favoriteSounds()->paginate($request->limit);

        return $this->response->paginator($sounds, new SoundTransformer());
    }
}
