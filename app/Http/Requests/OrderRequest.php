<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'products' => 'array|min:1',
            "products.*.id" => "required|integer|exists:products,id",
            "products.*.amount" => "required|integer|min:1",
            'name' => 'string|min:3|max:100',
            'address' => 'string|min:3|max:100',
            'phone' => 'string|min:6|max:30',
        ];
    }
}
