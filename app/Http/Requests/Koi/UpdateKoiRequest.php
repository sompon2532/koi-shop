<?php

namespace App\Http\Requests\Koi;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKoiRequest extends FormRequest
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
        $koi = $this->koi;

        return [
            'th.name' => 'required',
            'en.name' => 'required',
            'koi_id' => 'required',
            'oyagoi' => 'required',
            'born' => 'required',
            'price' => 'required',
        ];
    }
}
