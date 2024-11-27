<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'required|min:4|max:32',
            'content'=>'required|min:4',
            'category_id'=>'required|gt:0',
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => '標題必填',
            'title.min' => '標題最少4字',
            'title.max' => '標題最多32字',
            'content.required' => '內容必填',
            'content.min' => '內容不能少於4字',
            'category_id.required' => '分類必填',
            'category_id.gt' => '分類必填',
        ];
    }
}