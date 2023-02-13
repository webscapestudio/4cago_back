<?php

namespace App\Http\Requests\Work\BannedReason;

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
            'banned_reason' => 'required|string',
            'other_report' => 'nullable',
        ];
    }
    public function messages()
    {
        return [
            'banned_reason.required' => 'Это поле обязательно для заполнения',
        ];
    }
}
