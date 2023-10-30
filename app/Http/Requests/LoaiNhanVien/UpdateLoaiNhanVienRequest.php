<?php

namespace App\Http\Requests\LoaiNhanVien;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLoaiNhanVienRequest extends FormRequest
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
            'luongCoBan' => [
                'required',
                'numeric', // Kiểm tra giá trị là số
                'min:0' // Giá trị tối thiểu phải là không âm
            ],
            
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute bắt buộc phải điền.',
            'min' => ':attribute phải có ít nhất :min ký tự.',
            'max' => ':attribute không được vượt quá :max ký tự.',
            'regex' => ':attribute có ký tự không hợp lệ.',
            'numeric' => ':attribute là chữ số.'
        ];
    }

    public function attributes(): array
    {
        return [
            'tenLoai' => 'Tên loại',
            'luongCoBan' => 'Lương Cơ Bản',
        ];
    }
}
