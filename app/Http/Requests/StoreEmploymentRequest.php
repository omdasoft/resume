<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StoreEmploymentRequest extends FormRequest
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
            'designation' => 'required',
            'company' => 'required',
            'country' => 'required',
            'start_date' => 'required',
            'end_date' => 'required_if:until_now,==,null',
            'employment_details.*.desc' => 'required'
            //'until_now' => 'required_if:end_date,==,null'
        ];
    }
}
