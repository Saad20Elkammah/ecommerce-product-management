<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|min:10',
            'price' => 'required|numeric|min:0|max:100000',
            'quantity' => 'required|integer|min:0|max:10000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The product name is required.',
            'description.required' => 'The product description is required.',
            'description.min' => 'The product description must be at least 10 characters.',
            'price.required' => 'The product price is required.',
            'quantity.required' => 'The product quantity is required.',
            'price.numeric' => 'The price must be a valid number.',
            'quantity.integer' => 'The quantity must be a valid integer.',
        ];
    }
}
