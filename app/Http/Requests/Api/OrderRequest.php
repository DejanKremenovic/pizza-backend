<?php

namespace App\Http\Requests\Api;

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
            'name' => 'required|string|min:1|max:100',
            'address' => 'required|string|min:1|max:100',
            'phone' => 'required|string|min:7|max:15',
        ];
    }
}
