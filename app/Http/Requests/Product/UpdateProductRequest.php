<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
        $product = $this->product;

        return [
            'th.name' => 'required',
            'en.name' => 'required',
            'product_id' => 'required',
            'slug' => 'required|unique:products,slug,'.$product->id,
            'delivery' => 'required',
            'price' => 'required',
        ];
    }
}
