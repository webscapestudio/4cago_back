<?php

namespace App\Http\Requests\Admin\UpperBanner;

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
            'banner_image_mob' => 'required|file',
            'banner_image_tablet' => 'required|file',
            'banner_image_desktop' => 'required|file',
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
            'banner_image_mob.required' => 'Это поле обязательно для заполнения',
            'banner_image_tablet.required' => 'Это поле обязательно для заполнения',
            'banner_image_desktop.required' => 'Это поле обязательно для заполнения',
            'banner_image_mob.file' => 'Необходимо выбрать файл',
            'banner_image_tablet.file' => 'Необходимо выбрать файл',
            'banner_image_desktop.file' => 'Необходимо выбрать файл',
        ];
    }
}
