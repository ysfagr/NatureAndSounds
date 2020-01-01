<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VersionCheckRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'platform'              => 'required|in:ios,android',
            'version_code'          => 'required',
            'language_version_code' => 'required',
        ];
    }
}


