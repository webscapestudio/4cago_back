<?php

namespace App\Http\Requests\Personal\Post;

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
            'published' =>  'required|string',
            'title' => 'required|string',
            'content' => 'required|string',
            'post_image' => 'nullable|file',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'nullable|integer|exists:tags,id',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Это поле обязательно для заполнения',
            'title.string' => 'Данные должны соответствовать строчному типу',
            'content.required' => 'Это поле обязательно для заполнения',
            'post_image.required' => 'Это поле обязательно для заполнения',
            'post_image.file' => 'Необходимо выбрать файл',
            'category_id.required' => 'Это поле обязательно для заполнения',
            'category_id.exists' => 'ID должен быть в базе данных',
            'tags.array' => 'Должен быть массив данных',
        ];
    }
}
