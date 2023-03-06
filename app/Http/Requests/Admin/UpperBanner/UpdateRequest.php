<?php

namespace App\Http\Requests\Admin\UpperBanner;

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
            'published' => 'required|string',
            'title' => 'required|string',
            'link' => 'required|string',
            'banner_image_mob' => 'required|file',
            'banner_image_tablet' => 'required|file',
            'banner_image_desktop' => 'required|file',
        ];
    }
}
