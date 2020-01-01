<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Unique;

class VersionStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Returns true because it's controller by route middleware
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
            'platform'     => 'required|in:ios,android',
            'version_code' => [
                'required', (new Unique('versions'))->where('platform', $this->platform),
            ],
            'language_version_code' => 'required',
            'force_update'          => 'required',
        ];
    }
}


