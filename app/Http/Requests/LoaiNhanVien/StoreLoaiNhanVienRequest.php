<?php

namespace App\Http\Requests\LoaiNhanVien;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoaiNhanVienRequest extends FormRequest
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
                'tenLoai' => 'unique:App\Models\LoaiNhanVien,tenLoai',
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
            'numeric' => ':attribute là chữ số.',
            'unique' => ':attribute đã được sử dụng.',
        ];
    }

    public function attributes(): array
    {
        return [
            'tenLoai' => 'Tên loại NV',
            'luongCoBan' => 'Lương Cơ Bản',
        ];
    }
}
