<?php

namespace App\Http\Requests;

use App\Rules\FileExistsRule;

class SoundStoreRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Returned true because user checked on route middleware
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
            'name'           => 'required|max:255',
            'length'         => 'required',
            'artist_name'    => 'required|max:255',
            'category_id'    => 'required|exists:categories,id',
            'sound_file_url' => ['required', new FileExistsRule()],
        ];
    }
}

