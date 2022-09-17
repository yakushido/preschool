<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhotoRequest extends FormRequest
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
            'img_path' => ['required', 'file', 'mimes:jpg'],
        ];
    }
    
    public function messages()
    {
        return [
            'required' => ':attributeを入力してください。',
            'mimes' => '投稿できる:attributeの拡張子はjpgのみです。',
        ];
    }

    public function attributes()
    {
        return [
            'img_path' => '画像'
        ];
    }
}
