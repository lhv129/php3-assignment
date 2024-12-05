<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'category_id' => 'required',
            'code' => 'required',
            'name' => 'required',
            'discount_price' => 'required|min:0|numeric',
            'quantity' => 'required|min:0|numeric',
            'unit_price' => 'required|min:0|numeric',
        ];
    }
    public function messages()
    {
        return [
            'required' => ':Attribute không được để trống',
            'numeric' => ':Attribute phải là số',
            'min' => ':Attribute phải là số dương'
        ];
    }
}
