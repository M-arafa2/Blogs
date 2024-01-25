<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {

        $rules = [


            'title' => 'required|string|min:3',

        ];
        if($this->isMethod('POST')) {
            $rules += [
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:4048',
                'content' => 'required|string|min:20',
            ];
        }
        if($this->isMethod('PATCH')) {
            $rules += [
                'image' => 'sometimes|image|mimes:jpg,png,jpeg,gif,svg|max:4048',
                'content' => 'sometimes|string|min:20',
            ];
        }
        return $rules;

    }
}
