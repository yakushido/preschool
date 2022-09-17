<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditAdminRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('admins')->ignore($this->id)],
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attributeを入力してください。',
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
        ];
    }
}
