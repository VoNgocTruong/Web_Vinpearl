<?php

namespace App\Http\Requests\SoCa;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSoCaRequest extends FormRequest
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
            'maNV' => [
                'required',
                'exists:nhan_viens,maNV'
            ],
            'soCa' => [
                'bail',
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
            'numeric' => ':attribute phải là một số.',
            'min' => ':attribute phải có ít nhất :min ký tự.',
            
        ];
    }

    public function attributes(): array
    {
        return [
            'maNV' => 'Mã NV',
            'soCa' => 'Số Ca',
        ];
    }
}
