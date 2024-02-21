<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'introduction' => [
                'required',
                'min:50',
                'max:200'
                ]
        ];
    }

    public function introduction(): string
    {
        return $this->input('introduction')
    }

        /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'introduction.required' => '自己紹介は50文字以上200文字以下で入力してください',
            'introduction.min' => '自己紹介は50文字以上200文字以下で入力してください',
            'introduction.max' => '自己紹介は50文字以上200文字以下で入力してください',
        ];
    }

}
