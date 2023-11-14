<?php

namespace App\Exports;

use App\Models\LoaiDichVu;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class LoaiDichVuExport implements FromQuery, WithHeadings, WithColumnWidths
{
    public function query()
    {
        return LoaiDichVu::query()
            ->select('maLoaiDV', 'tenLoai', 'created_at', 'updated_at');
    }

    public function headings(): array
    {
        return [
            'Mã Loại',
            'Tên Loại',
            'Ngày Tạo',
            'Ngày Cập Nhật',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 15,
            'B' => 20,
            'C' => 20,
            'D' => 20,
        ];
    }
}
