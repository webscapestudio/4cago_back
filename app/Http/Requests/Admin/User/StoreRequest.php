<?php

namespace App\Http\Requests\Admin\User;

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
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
            'role' => 'required|integer',
            'user_avatar' => 'nullable|file'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Поле обязательно для заполнения',
            'name.string' => 'Поле должно быть строкой',
            'email.required' => 'Поле "E-mail" обязательно для заполнения',
            'email.string' => 'Поле должно быть строкой',
            'email.email' => 'Поле "E-mail" должно соответствовать формату name@domain.com',
            'email.unique' => 'Пользователь с таким "E-mail" уже существует',
            'password.required' => 'Поле обязательно для заполнения',
            'password.string' => 'Поле должно быть строкой',
            'user_avatar.file' => 'Необходимо выбрать файл'
        ];
    }
}
