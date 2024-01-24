<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorRequest extends FormRequest
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
                    'type'          => 'required',
                    'gender'        => 'required',
                    'country_id'    => 'nullable',
                    'city_id'       => 'nullable',
                    'name'          => 'required',
                    'email'         => 'required|email|max:255|unique:users',
                    'phone'         => 'required|numeric|unique:users',
                    'password'      => 'required|min:6',
                    'maarouf_link'  => 'nullable',
                    'commercial_no' => 'nullable',
                    'tax_id' => 'nullable',
                    'department_id' => 'nullable',
                    'merchant_address' => 'nullable', 

                    'desc'          => 'nullable',
                    'bank'          => 'nullable',
                    'to'          => 'nullable',
                    'from'          => 'nullable',
                    'service'          => 'nullable',
                    'image'         => 'nullable|mimes:jpg,jpeg,png,svg|max:20000',
                    'lat'    => 'nullable',
                    'long'    => 'nullable',



                 
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'type'          => 'required',
                    'gender'        => 'required',
                    'country_id'    => 'nullable',
                    'city_id'       => 'nullable',
                    'name'          => 'required',
                    'email'         => 'required|email|max:255|unique:users,email,'.$this->route()->vendor->id,
                    'phone'         => 'required|numeric|unique:users,phone,'.$this->route()->vendor->id,
                    'password'      => 'nullable|min:6',
                    'maarouf_link'  => 'nullable',
                    'commercial_no' => 'nullable',
                    'tax_id' => 'nullable',
                    'department_id' => 'nullable',
                    'merchant_address' => 'nullable', 
                    'desc'          => 'nullable',
                    'bank'          => 'nullable',
                    'to'          => 'nullable',
                    'from'          => 'nullable',
                    'service'          => 'nullable',
                    'image'         => 'nullable|mimes:jpg,jpeg,png,svg|max:20000',
                    'lat'    => 'nullable',
                    'long'    => 'nullable',
                ];
            }
            default: break;
        }
    }
}
