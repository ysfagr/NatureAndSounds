<?php

namespace App\Transformers;

use App\Category;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract
{
    /**
     * Transform Category model to array.
     *
     * @param Category $category
     *
     * @return array
     */
    public function transform(Category $category)
    {
        return [
            'id'        => $category->id,
            'name'      => $category->name,
            'image_url' => $category->image_url,
        ];
    }
}

