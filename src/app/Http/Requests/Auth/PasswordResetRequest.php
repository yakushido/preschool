<?php

namespace App\Http\Requests\auth;

use Illuminate\Foundation\Http\FormRequest;

class PasswordResetRequest extends FormRequest
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
            'token' => ['required'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attributeを入力してください。',
            'email' => ':attributeが正しい形式ではありません。',
        ];
    }

    public function attributes()
    {
        return [
            'email'    => 'メールアドレス',
            'password'    => 'パスワード',
        ];
    }
}
