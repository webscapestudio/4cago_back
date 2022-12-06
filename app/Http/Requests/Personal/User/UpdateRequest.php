<?php

namespace App\Http\Requests\Personal\User;

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
            'name' => 'nullable|string',
            'email' => 'nullable|string|email',
            'user_avatar' => 'nullable|file'
        ];
    }
    public function messages()
    {
        return [
            'name.string' => 'Имя должно быть строкой',
            'email.string' => 'Имя должно быть строкой',
            'email.email' => 'Поле "E-mail" должно соответствовать формату name@domain.com',
            'user_avatar.file' => 'Необходимо выбрать файл'
        ];
    }
}
