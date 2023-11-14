<?php

namespace App\Http\Requests\LoaiDichVu;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLoaiDichVuRequest extends FormRequest
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
            'tenLoai' => [
                'bail',
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/^[\p{L}\s]+$/u'
            ],
        ];
    }
    public function messages(): array
    {
        return [
            'required' => ':attribute bắt buộc phải điền.',
            'min' => ':attribute phải có ít nhất :min ký tự.',
            'max' => ':attribute không được vượt quá :max ký tự.',
            'unique' => ':attribute đã được sử dụng.',
            'regex' => ':attribute có ký tự không hợp lệ.',
            'tenLoai.regex' => ':attribute không được có số',
        ];
    }
    public function attributes(): array
    {
        return [
            'tenLoai' => 'Tên loại dịch vụ',
        ];
    }
}
