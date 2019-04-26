<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentsRequest extends FormRequest
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
            'post_id' => 'required|exists:posts,id',
            'body'  => 'required|max:2000',
        ];
    }

    public function messages()
    {
        return [
            'body.required'  => 'コメント本文は入力必須の項目です。',
            'body.max'       => '2000文字以下で入力してください。',
        ];
    }

}

