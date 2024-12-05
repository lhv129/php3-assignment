<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'name' => 'required|min:5|max:25|unique:users,name,'.$this->id,
            'email' => 'required|email|unique:users,email,'.$this->id,
            'roleValue' => 'required',
            'activeValue' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'required' => ':Attribute không được để trống',
            'name.max' => 'Tên quá dài hãy chọn tên khác',
            'unique' => ':Attribute đã tồn tại, vui lòng chọn :Attribute khác',
            'email.email' => 'Email phải đúng định dạng',
            'min' => ':Attribute phải ít nhất 5 kí tự',
        ];
    }
}
