<?php

namespace App\Http\Requests\Personal\Advertisement;

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
            'published' =>  'required|string',
            'title' => 'required|string',
            'content' => 'required|string',
            'advertisement_image' => 'nullable|file',
            'category_advertisement_id' => 'required|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'nullable|integer|exists:tags,id',
            'description' => 'nullable|string'

        ];
    }
}
