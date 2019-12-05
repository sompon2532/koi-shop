<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'th.name' => 'required',
            'en.name' => 'required',
            // 'product_id' => 'required',
            // 'delivery' => 'required',
            // 'price' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'th.name.required' => 'กรุณาชื่อสินค้า (ภาษาไทย)',
            'en.name.required' => 'กรุณาชื่อสินค้า (ภาษาอังกฤษ)'
        ];
    }
}
