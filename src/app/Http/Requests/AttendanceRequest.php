<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AttendanceRequest extends FormRequest
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
            'date' => ['required',
                Rule::unique('user_attendances')->where(function($querry){
                    return $querry->where('user_id', $this->input('id'));
                })
            ]
        ];
    }

    public function messages()
    {
        return [
            'date.required' => '日付を選択してください',
            'date.unique' => 'その日は登録されています'
        ];
    }
}
