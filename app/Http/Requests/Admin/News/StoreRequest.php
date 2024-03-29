<?php

namespace App\Http\Requests\Admin\News;

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
            'published' => 'required|string',
            'title' => 'required|string',
            'content' => 'required|string',
            'news_image' => 'nullable|file',
            'tags' => 'nullable|array',
            'tags.*' => 'nullable|integer|exists:tags,id',
            'description' => 'nullable|string'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Это поле обязательно для заполнения',
            'content.required' => 'Это поле обязательно для заполнения',
            'title.string' => 'Данные должны соответствовать строчному типу',
            'content.required' => 'Это поле обязательно для заполнения',
            'news_image.file' => 'Необходимо выбрать файл',
            'tags.array' => 'Должен быть массив данных',
            'description.string' => 'Данные должны соответствовать строчному типу',
        ];
    }
}
