<?php

namespace App\Http\Requests\Personal\Advertisement;

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
            'advertisement_image' => 'nullable|file',
            'term' => 'required|string',
            'type' => 'required|string',
            'category_advertisement_id' => 'required|exists:categories,id',

        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Это поле обязательно для заполнения',
            'title.string' => 'Данные должны соответствовать строчному типу',
            'content.required' => 'Это поле обязательно для заполнения',
        ];
    }
}
