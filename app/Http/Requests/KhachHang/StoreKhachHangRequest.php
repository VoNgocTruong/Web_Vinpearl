<?php

namespace App\Http\Requests\KhachHang;

use Illuminate\Foundation\Http\FormRequest;

class StoreKhachHangRequest extends FormRequest
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
            'hoTenKH' => [
                'bail',
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/^[\p{L}\s]+$/u'
            ],
            'sdt' => [
                'bail',
                'required',
                'string',
                'min:10',
                'max:20',
                'regex:/^[0-9]+$/',
            ],
            'diaChi' => [
                'bail',
                'required',
                'string',
                'min:10',
                'regex:/^[\p{L}0-9\s\-\.\,]+$/u'
            ],
            'ngaySinh' => [
                'bail',
                'date_format:d/m/Y',
            ],
            'gioiTinh' => [
                'bail',
                'required',
                'in:0,1,2',
            ],
            'email' => [
                'bail',
                'required',
                'string',
                'email',
                'email' => 'unique:App\Models\KhachHang,email',
            ],
            'matKhau' => [
                'bail',
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[A-Za-z])(?=.*\d).+$/',
            ],
            'anh' => [
                'bail',
                'file',
                'mimes:jpg,png',
            ],
        ];
    }
    public function messages(): array
    {
        return [
            'required' => ':attribute bắt buộc phải điền.',
            'min' => ':attribute phải có ít nhất :min ký tự.',
            'max' => ':attribute không được vượt quá :max ký tự.',
            'email' => ':attribute không đúng định dạng.',
            'unique' => ':attribute đã được sử dụng.',
            'date_format' => ':attribute không đúng định dạng ngày tháng năm sinh.',
            'gioiTinh.in' => ':attribute phải thuộc một trong Nam Nữ hoặc Khác.',
            'regex' => ':attribute có ký tự không hợp lệ.',
            'diaChi.regex' => ':attribute có ký tự không hợp lệ.',
            'sdt.regex' => ':attribute không được có kí tự chữ cái.',
            'matKhau.regex' => ':attribute phải có số và chữ cái.',
            'hoTenKH.regex' => ':attribute không được có số',
            'mimes' => ':attribute phải là một tệp ảnh có định dạng jpg hoặc png.',
            'file' => ':attribute phải là một tệp.',
        ];
    }
    public function attributes(): array
    {
        return [
            'hoTenKH' => 'Họ tên',
            'sdt' => 'Số điện thoại',
            'diaChi' => 'Địa Chỉ',
            'ngaySinh' => 'Ngày sinh',
            'gioiTinh' => 'Giới tính',
            'email' => 'Địa chỉ email',
            'matKhau' => 'Mật khẩu',
            'anh' => 'File ảnh',
        ];
    }
}
