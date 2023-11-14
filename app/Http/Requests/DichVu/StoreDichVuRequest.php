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
            ],
            'maLoaiDV' => [
                'required',
                'exists:loai_dich_vus,maLoaiDV'
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
                'nullable',
                'numeric',
                'min:0',
                'max:10',
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
