<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class productRequest extends FormRequest
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
            'slug_url' => 'required',
            'thumb' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Tiên đề không có',
            'slug_url.required' => 'Đường dẫn không có',
            'thumb.required' => 'Ảnh dẫn không có',
        ];
    }
}