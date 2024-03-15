<?php

namespace App\Http\Requests\Data;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
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
        $categoryId = $this->getCategoryId();

        return [
            'data_item' => [
                'required',
                'max:50',
                Rule::unique('learning_data', 'name')
                    ->where('user_id', $this->user()->id)
                    ->where('month', $this->input('month'))
                    ->where('category_id', $categoryId),
            ],
            'time' => [
                'required',
                'numeric',
                'min:1'
            ]
        ];
    }

    protected function getCategoryId(): int
    {
        $category = $this->input('category');

        if ($category == 'バックエンド') {
            return 1;
        } elseif ($category == 'フロントエンド') {
            return 2;
        } else {
            return 3;
        }
    }
    
        public function messages(): array
        {
            $data_item = $this->input('data_item');

        return [
            'data_item.required' => '項目名は必ず入力してください',
            'data_item.max' => '項目名は50文字以内で入力してください',
            'data_item.unique' => $data_item.'は既に登録されています',
            'time.required' => '学習時間は必ず入力してください',
            'time.numeric' => '学習時間は0以上の数字で入力してください',
            'time.min' => '学習時間は0以上の数字で入力してください',
        ];
    }

}
