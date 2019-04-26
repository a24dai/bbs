<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
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
            'title' => 'required|max:50',
            'body'  => 'required|max:2000',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'タイトルは入力必須の項目です。',
            'title.max'      => '50文字以下で入力してください。',
            'body.required'  => '本文は入力必須の項目です。',
            'body.max'       => '2000文字以下で入力してください。',
        ];
    }

}

