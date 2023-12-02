<?php

namespace App\Http\Requests\policy;

use Illuminate\Foundation\Http\FormRequest;

class createRequestPlicy extends FormRequest
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
            'link_url' => 'required',
            'sort_by' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'không có tên',
            'link_url.required' => 'không có đường dẫn',
            'sort_by.required' => 'không có sấp xếp',
        ];
    }
}