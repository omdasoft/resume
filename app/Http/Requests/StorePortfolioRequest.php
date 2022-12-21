<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StorePortfolioRequest extends FormRequest
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
        if($this->isMethod('PUT')) {
            return [
                'title' => 'required',
                'summary' => 'required',
                'url' => 'required',
                'github_url',
            ];
        }
        return [
            'title' => 'required',
            'summary' => 'required',
            'url' => 'required',
            'github_url',
            'image' => 'required|image|mimes:jpg,jpeg,png',
        ];
    }
}
