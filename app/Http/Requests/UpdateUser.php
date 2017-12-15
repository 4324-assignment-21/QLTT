<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
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
            'txtEmail' => 'email|max:255',
            'sdt' => 'numeric',
            'txtRePass' => 'same:txtPass'
        ];
    }

    public function messages () {
        return [
            'txtEmail.email' => 'Lỗi cú pháp email',
            'txtEmail.max' => 'Email quá dài, tối đa chỉ 255 kí tự',
            'sdt.numeric' => 'Không phải kiểu số',
            'txtRePass.same' => 'Hai mật khẩu không giống nhau'
        ];
    }
}
