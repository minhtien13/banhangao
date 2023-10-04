<?php

namespace App\Http\Requests\post;

use Illuminate\Foundation\Http\FormRequest;

class postRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
           'title' => 'required',
           'thumb' => 'required',
           'slug_url' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Tiêu để không có',
            'thumb.required' => 'Ảnh không có',
            'slug_url.required' => 'Đường dẫn không có'
        ];
    }
}