<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfilevendorRequest extends FormRequest
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
            // 'type'          => 'required',
            'gender'        => 'required',
            'country_id'    => 'nullable',
            'city_id'       => 'nullable',
            'name'          => 'required',
            'email'         => ['required', 'string', 'email', 'unique:users,email,' . auth()->id()],
            'phone'         => ['required', 'string', 'numeric', 'unique:users,phone,' . auth()->id()],
            'password'      => 'nullable|min:6',
            'freelance_document'      => 'nullable|unique:users,freelance_document,' . auth()->id(),
            'freelance_image'         => 'nullable|mimes:jpg,jpeg,png,svg|max:20000',
            'image'         => 'nullable|mimes:jpg,jpeg,png,svg|max:20000'
        ];
    }
}
