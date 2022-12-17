<?php

namespace App\Http\Requests\Advertisement\Comment;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'content' => 'required|string',
            'comment_image' => 'nullable|file',
        ];
    }
    public function messages()
    {
        return [
            'content.required' => 'Это поле обязательно для заполнения',
            'comment_image.file' => 'Необходимо выбрать файл',
        ];
    }
}
