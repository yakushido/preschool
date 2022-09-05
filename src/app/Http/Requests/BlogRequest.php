<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:50'],
            'content' => ['required', 'string', 'max:255'],
            'img_path' => ['required', 'file', 'mimes:jpg'],
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attributeを入力してください。',
            'mimes' => '投稿できる:attributeの拡張子はjpgのみです。',
            'max' => ':attributeの文字数は:max文字以下で入力してください。'
        ];
    }

    public function attributes()
    {
        return [
            'title'    => 'タイトル',
            'content'    => '内容',
            'img_path' => '画像'
        ];
    }
}
