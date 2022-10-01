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
          'name'=>'required|string'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Это поле обязательно для заполнения',
            'name.string'=>'Данные должны соответствовать строчному типу',
          ];
    }
}
