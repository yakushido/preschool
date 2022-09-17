<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:50'],
            'content' => ['required', 'string', 'max:255']
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attributeを入力してください。',
            'max' => ':attributeの文字数は:max文字以下で入力してください。'
        ];
    }

    public function attributes()
    {
        return [
            'name'    => 'イベント名',
            'content'    => 'イベント内容'
        ];
    }
}
