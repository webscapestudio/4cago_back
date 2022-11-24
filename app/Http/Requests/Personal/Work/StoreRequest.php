<?php

namespace App\Http\Requests\Personal\Work;

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
            'title' => 'required|string',
            'content' => 'required|string',
            'work_image' => 'nullable|file',
            'requirements' => 'nullable|string',
            'tasks' => 'nullable|string',
            'conditions' => 'nullable|string',
            'mail_applicants' => 'nullable|string',
            'mail_notifications' => 'nullable|string',
            'whatsapp' => 'nullable|string',
            'telegram' => 'nullable|string',
            'salary_from' => 'nullable|string',
            'salary_before' => 'nullable|string',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Это поле обязательно для заполнения',
            'title.string' => 'Данные должны соответствовать строчному типу',
            'content.required' => 'Это поле обязательно для заполнения',
            'work_image.file' => 'Необходимо выбрать файл',
        ];
    }
}
