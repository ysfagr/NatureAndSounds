<?php

namespace App\Http\Requests;

use App\Rules\FileExistsRule;

class CategoryStoreRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Returns true because permission control works on admin route middleware
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => 'required|max:255',
            'image_url' => ['required', new FileExistsRule()],
        ];
    }
}

