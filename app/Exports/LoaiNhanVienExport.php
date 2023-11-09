<?php

namespace App\Exports;

use App\Models\LoaiNhanVien;

use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;


class LoaiNhanVienExport implements FromQuery, WithHeadings, WithColumnWidths
{
    public function query()
    {
        return LoaiNhanVien::query()
            ->select(
                'loai_nhan_viens.maLoaiNV',
                'loai_nhan_viens.tenLoai',
                'loai_nhan_viens.luongCoBan',
            );
    }

    public function headings():array
    {
        return[
            'Mã Loại',
            'Tên Loại',
            'Lương Cơ Bản (VND)',

        ];
    }

    public function columnWidths():array
    {
        return [
            'A' => 15,
            'B' => 20,
            'C' => 20,
        ];
    }
}
