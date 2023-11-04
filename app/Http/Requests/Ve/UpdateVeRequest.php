<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVeRequest extends FormRequest
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
            'maDV' => [
                'bail',
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/^[\p{L}\s]+$/u',
                'exists:dich_vus,maDV',
            ],
            'loaiVe' => [
                'bail',
                'required',
                'in:Trẻ em,Người lớn',
            ],
            'giaTien' => [
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
            'unique' => ':attribute đã được sử dụng.',
            'loaiVe.in' => ':attribute phải thuộc một trong Nam Nữ hoặc Khác.',
            'regex' => ':attribute có ký tự không hợp lệ.',
            'numeric' => ':attribute là chữ số.',
        ];
    }

    public function attributes(): array
    {
        return [
            'maDV' => 'Loại dịch vụ',
            'loaiVe' => 'Loại vé',
            'giaTien' => 'Giá vé',
        ];
    }
}
