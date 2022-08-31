<?php

namespace App\Http\Requests\auth;

use Illuminate\Foundation\Http\FormRequest;

class AdminResisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'min:8'],
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attributeを入力してください。',
            'min' => ':attributeは:min文字以上で入力してください。',
            'max' => ':attributeは:max文字以下で入力してください。',
            'email' => ':attributeが正しい形式ではありません。',
            'unique' => 'この:attributeはすでに登録されています。',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '氏名',
            'email'    => 'メールアドレス',
            'password'    => 'パスワード',
        ];
    }
}
