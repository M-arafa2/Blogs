<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubDepartmentRequest extends FormRequest
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
                    'name' => 'required|max:255|unique:departments',
                    'status' => 'nullable',
                    'cover' => 'nullable',
                    'parent_id'  => 'required:exists:departments,id'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {

                return [
                    'name' => 'required|max:255|unique:departments,name,'.$this->route()->department->id,
                    'status' => 'nullable',
                    'cover' => 'nullable',
                    'parent_id'  => 'required:exists:departments,id'
                ];
            }
            default: break;
        }
    }
}
