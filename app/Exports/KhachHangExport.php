<?php

namespace App\Exports;

use App\Models\KhachHang;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;

class KhachHangExport implements FromQuery, WithHeadings, WithColumnWidths
{
    public function query()
    {
        return KhachHang::query()
        ->select(
            'khach_hangs.maKH',
            'khach_hangs.hoTenKH',
            'khach_hangs.sdt',
            'khach_hangs.diaChi',
            'khach_hangs.ngaySinh',
            'khach_hangs.gioiTinh',
            'khach_hangs.email',
            'khach_hangs.anh',
            'khach_hangs.created_at',
            'khach_hangs.updated_at',
        );
    }
    public function headings(): array
    {
        return [
            'Mã KH',
            'Họ và Tên',
            'Số điện thoại',
            'Địa Chỉ',
            'Ngày Sinh',
            'Giới Tính',
            'Email',
            'Ảnh',
            'Ngày Tạo',
            'Ngày Cập Nhật',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 20,
            'C' => 15,
            'D' => 30,
            'E' => 15,
            'F' => 10,
            'G' => 25,
            'H' => 25,
            'I' => 30,
            'J' => 30,
        ];
    }
}
