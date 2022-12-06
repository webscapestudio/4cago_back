<?php

namespace App\Http\Requests\Advertisement\Comment;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'post_image' => 'file',
        ];
    }
    public function messages()
    {
        return [
            'content.required' => 'Это поле обязательно для заполнения',
            'post_image.file' => 'Необходимо выбрать файл',
        ];
    }
}