<?php

namespace App\Http\Requests\Admin\Post;

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
          'title'=>'required|string',
          'content'=>'required|string', 
          'post_image'=>'required|file',
          'category_id'=>'required|exists:categories,id',
          'tag_ids'=>'nullable|array',
          'tag_ids.*'=>'nullable|integer|exists:tags,id',
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'Это поле обязательно для заполнения',
            'title.string'=>'Данные должны соответствовать строчному типу',
            'content.required'=>'Это поле обязательно для заполнения',
            'post_image.required'=>'Это поле обязательно для заполнения',
            'post_image.file'=>'Необходимо выбрать файл',
            'category_id.required'=>'Это поле обязательно для заполнения',
            'category_id.integer'=>'ID должен быть числом',
            'category_id.exists'=>'ID должен быть в базе данных',
            'tag_ids.array'=>'Должен быть массив данных',
          ];
    }
}
