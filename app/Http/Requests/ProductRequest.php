<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
                        'name' => 'required|max:255',
                        'department_id' => 'required',
                        'description' => 'required',
                        'price' => 'required|numeric',
                        'leadtime' => 'nullable|numeric',
                        'delivery' => 'required',
                        // 'delivery_time1' => 'required',
                        // 'delivery_date1' => 'required',
                        // 'delivery_time2' => 'required',
                        // 'delivery_date2' => 'required',

                        'insurance' => 'required',
                        'insurance_amount' => 'required_if:insurance,1|numeric',
                        'image' => 'nullable|mimes:jpg,jpeg,png,gif',
                        'images' => 'nullable|max:6',
                        // 'images' => 'required|array',
                        // 'images.*' => 'nullable|image|max:6|mimes:jpeg,png,jpg,gif,svg',

                    ];
                }
            case 'PUT':
            case 'PATCH': {
                    return [
                        'name' => 'required|max:255',
                        'department_id' => 'required',
                        'description' => 'required',
                        'price' => 'required|numeric',
                        'leadtime' => 'nullable|numeric',
                        // 'delivery_time1' => 'required',
                        // 'delivery_date1' => 'required',
                        // 'delivery_time2' => 'required',
                        // 'delivery_date2' => 'required',
                        'delivery' => 'required',
                        'insurance' => 'required',
                        'insurance_amount' => 'required_if:insurance,1|numeric',
                        'image' => 'nullable|mimes:jpg,jpeg,png,gif',
                    ];
                }
            default:
                break;
        }
    }
}
