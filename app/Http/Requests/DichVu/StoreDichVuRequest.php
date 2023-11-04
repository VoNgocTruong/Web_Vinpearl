<?php

namespace App\Http\Requests\DichVu;

use Illuminate\Foundation\Http\FormRequest;

class StoreDichVuRequest extends FormRequest
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
            'tenDV' => [
                'bail',
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/^[\p{L}\s]+$/u'
            ],
            'sdtDV' => [
                'bail',
                'required',
                'string',
                'min:10',
                'max:20',
                'regex:/^[0-9]+$/',
            ],
            'diaChiDV' => [
                'bail',
                'required',
                'string',
                'min:10',
                'regex:/^[\p{L}0-9\s\-\.\,]+$/u'
            ],
            'maLoaiDV' => [
                'required',
                'exists:loai_dich_vus,maLoaiDV' // Kiểm tra xem giá trị nhập liệu có tồn tại trong bảng loai_nhan_viens hay không
            ],
            'moTa' => [
                'bail',
                'required',
                'string',
            ],
            'anh' => [
                'bail',
                'file',
                'mimes:jpg,png',
            ],
            'xepLoai' => [
                'nullable', // Allow the field to be optional
                'numeric', // Must be a number
                'min:0', // For example, minimum value (adjust according to your requirements)
                'max:10', // For example, maximum value (adjust according to your requirements)
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
            'diaChiDV.regex' => ':attribute có ký tự không hợp lệ.',
            'sdtDV.regex' => ':attribute không được có kí tự chữ cái.',
            'tenDV.regex' => ':attribute không được có số',
            'mimes' => ':attribute phải là một tệp ảnh có định dạng jpg hoặc png.',
            'file' => ':attribute phải là một tệp.',
        ];
    }
    public function attributes(): array
    {
        return [
            'tenDV' => 'Tên dịch vụ',
            'sdtDV' => 'Số điện thoại',
            'diaChiDV' => 'Địa Chỉ',
            'moTa' => 'Mô tả',
            'xepLoai' => 'Xếp Loại',
            'maLoaiDV' => 'Loại dịch vụ',
            'anh' => 'File ảnh',
        ];
    }
}
