<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SitepageRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
            {
                return [
                    'address'     => 'required',
                    'content'      => 'required',
                    'status'      => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'address'     => 'required',
                    'content'      => 'required',
                    'status'      => 'required',
                ];
            }
            default: break;
        }
    }

    public function messages()
    {
        return [
            'address.required'     =>  trans('validation.required'),
            'content.required'     =>  trans('validation.required'),
            'status.required'      =>  trans('validation.required'),
        ];
    }
}
