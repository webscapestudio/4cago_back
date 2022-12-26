<?php

namespace App\Http\Requests\Admin\RightBanner;

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
            'link' => 'required|string',
            'banner_image' => 'required|file',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Это поле обязательно для заполнения',
            'link.required' => 'Это поле обязательно для заполнения',
            'link.string' => 'Данные должны соответствовать строчному типу',
            'title.string' => 'Данные должны соответствовать строчному типу',
            'content.required' => 'Это поле обязательно для заполнения',
            'banner_image.required' => 'Это поле обязательно для заполнения',
            'banner_image.file' => 'Необходимо выбрать файл',
        ];
    }
}
