<?php

namespace App\Http\Requests\soclai;

use Illuminate\Foundation\Http\FormRequest;

class createRequestSoclai extends FormRequest
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
           'name' => 'required',
           'thumb' => 'required',
           'slug_link' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'không có tên liên kết',
            'thumb.required' => 'không có ánh đại diện liên kết',
            'slug_link.required' => 'không có đường dẫn liên kết',
        ];
    }
}