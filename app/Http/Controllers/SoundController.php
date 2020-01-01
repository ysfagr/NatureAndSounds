<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\SoundStoreRequest;
use App\Sound;
use App\Transformers\SoundTransformer;
use Dingo\Api\Http\Response;
use Illuminate\Http\Request;

class SoundController extends Controller
{
    
    /**
     * List all sounds by category with pagination.
     *
     * @param Request  $request
     * @param Category $category
     *
     * @return Response
     */
    public function indexByCategory(Request $request, Category $category): Response
    {
        $sounds = $category->sounds()->orderByDesc('id')->paginate($request->limit);

        return $this->response->paginator($sounds, new SoundTransformer());
    }

    /**
     * List all sounds.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request): Response
    {
        $sounds = Sound::orderByDesc('id')->paginate($request->limit);

        return $this->response->paginator($sounds, new SoundTransformer());
    }

    /**
     * @param Sound $sound
     *
     * @return Response
     */
    public function show(Sound $sound): Response
    {
        return $this->response->item($sound, new SoundTransformer());
    }

    /**
     * @param SoundStoreRequest $request
     *
     * @return Response
     */
    public function store(SoundStoreRequest $request): Response
    {
        $sound = Sound::create($request->all());

        return $this->response->item($sound, new SoundTransformer());
    }

    /**
     * @param SoundStoreRequest $request
     * @param Sound             $sound
     *
     * @return Response
     */
    public function update(SoundStoreRequest $request, Sound $sound): Response
    {
        $sound->update($request->all());

        return $this->response->item($sound, new SoundTransformer());
    }

    /**
     * @param Sound $sound
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy(Sound $sound): Response
    {
        $sound->delete();

        return $this->response->noContent();
    }
}
