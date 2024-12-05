<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => 'required|min:5|max:25|unique:users,name',
            'avatar' => 'required|image',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
            'confirm_password' => 'required|same:password',
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
            'avatar.image' => 'Ảnh đại diện phải là định dạng ảnh PNG,JPG...',
            'email.email' => 'Email phải đúng định dạng',
            'min' => ':Attribute phải ít nhất 5 kí tự',
            'confirm_password.same' => 'Password không giống nhau vui lòng nhập lại'
        ];
    }
}
