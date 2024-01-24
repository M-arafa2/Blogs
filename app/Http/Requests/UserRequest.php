<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            case 'POST': {
                    return [
                        'type'          => 'required',
                        'gender'        => 'required',
                        'country_id'    => 'nullable',
                        'city_id'       => 'nullable',
                        'name'          => 'required',
                        'email'         => 'required|email|max:255|unique:users',
                        'phone'         => 'required|numeric|unique:users',
                        'password'      => 'required|min:6',
                        'freelance_document'      => 'nullable|unique:users,freelance_document',
                        'freelance_image'         => 'nullable|mimes:jpg,jpeg,png,svg|max:20000',
                        'image'         => 'nullable|mimes:jpg,jpeg,png,svg|max:20000'
                    ];
                }
            case 'PUT':
            case 'PATCH': {
                    return [
                        'type'          => 'required',
                        'gender'        => 'required',
                        'country_id'    => 'nullable',
                        'city_id'       => 'nullable',
                        'name'          => 'required',
                        'email'         => 'required|email|max:255|unique:users,email,' . $this->route()->user->id,
                        'phone'         => 'required|numeric|unique:users,phone,' . $this->route()->user->id,
                        'password'      => 'nullable|min:6',
                        'freelance_document'      => 'nullable|unique:users,freelance_document,' . $this->route()->user->id,
                        'freelance_image'         => 'nullable|mimes:jpg,jpeg,png,svg|max:20000',
                        'image'         => 'nullable|mimes:jpg,jpeg,png,svg|max:20000'
                    ];
                }
            default:
                break;
        }
    }
}
