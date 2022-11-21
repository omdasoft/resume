<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StoreProfileRequest extends FormRequest
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
        if ($this->isMethod('PUT')) {
            return [
                'name' => 'required',
                'address' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'github_url' => 'required',
                'linkedin_url' => 'required',
                'title' => 'required',
                'summary' => 'required',
                'image' => 'image|mimes:jpg,jpeg,png',
                'cv' => 'mimes:doc,pdf,docx,zip'
            ];        
        }

        return [
            'name' => 'required',
            'address' => 'required',
            'email' => 'required|email|unique:profiles',
            'phone' => 'required',
            'github_url' => 'required',
            'linkedin_url' => 'required',
            'title' => 'required',
            'summary' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png',
            'cv' => 'required|mimes:doc,pdf,docx,zip'
        ];
    }

    public function failedValidation(Validator $validator) {

        throw new HttpResponseException(response()->json([

            'success'   => false,

            'message'   => 'Validation errors',

            'data'      => $validator->errors()

        ]));

    }
}
