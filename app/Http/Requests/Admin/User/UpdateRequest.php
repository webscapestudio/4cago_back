<?php

namespace App\Http\Requests\Admin\User;

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
            'name'=>'required|string|unique:users',
            'email'=>'required|string|email|unique:users,email,' . $this->user_id,
            'user_id' => 'required|integer|exists:users,id',
            'role' => 'required|integer'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Поле обязательно для заполнения',
            'name.string'=>'Имя должно быть строкой',
            'name.unique'=>'Пользователь с таким именем уже существует',
            'email.required'=>'Поле "E-mail" обязательно для заполнения',
            'email.string'=>'Имя должно быть строкой',
            'email.email'=>'Поле "E-mail" должно соответствовать формату name@domain.com',
            'email.unique'=>'Пользователь с таким "E-mail" уже существует',
          ];
    }
}
