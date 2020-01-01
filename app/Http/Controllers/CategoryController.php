<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryStoreRequest;
use App\Transformers\CategoryTransformer;
use Dingo\Api\Http\Response;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Get all categories with limit and pagination.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request): Response
    {
        $categories = Category::query()->orderByDesc('id')->paginate($request->limit);

        return $this->response->paginator($categories, new CategoryTransformer());
    }
        /**
     * @param Category $category
     *
     * @return Response
     */
    public function show(Category $category): Response
    {
        return $this->response->item($category, new CategoryTransformer());
    }

    /**
     * @param Category $category
     *
     * @return Response
     */
    public function destroy(Category $category): Response
    {
        $category->delete();

        return $this->response->noContent();
    }

    /**
     * Create new category.
     *
     * @param CategoryStoreRequest $request
     *
     * @return Response
     */
    public function store(CategoryStoreRequest $request): Response
    {
        $category = Category::create($request->all());

        return $this->response->item($category, new CategoryTransformer());
    }

    /**
     * @param CategoryStoreRequest $request
     * @param Category             $category
     *
     * @return Response
     */
    public function update(CategoryStoreRequest $request, Category $category): Response
    {
        $category->update($request->all());

        return $this->response->item($category, new CategoryTransformer());
    }
}
