<?php

namespace App\Exports;

use App\Models\NhanVien;

use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
// use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\WithEvents;

class NhanVienExport implements FromQuery, WithHeadings, WithColumnWidths
{

    //Sử dụng FromQuery
    public function query()
    {
        return NhanVien::query()
            ->select(
                'nhan_viens.maNV',
                'nhan_viens.hoTenNV',
                'nhan_viens.diaChi',
                'nhan_viens.ngaySinh',
                'nhan_viens.sdt',
                'nhan_viens.gioiTinh',
                'nhan_viens.anh',
                'loai_nhan_viens.tenLoai as maLoaiNV', 
                'nhan_viens.email',
                'nhan_viens.created_at',
                'nhan_viens.updated_at'
            )
            ->leftJoin('loai_nhan_viens', 'nhan_viens.maLoaiNV', '=', 'loai_nhan_viens.maLoaiNV');
    }

    public function headings(): array
    {
        return [
            'Mã NV',
            'Họ và Tên',
            'Địa chỉ',
            'Ngày Sinh',
            'Số Điện Thoại',
            'Giới Tính',
            'Ảnh',
            'Chức vụ',
            'Email',
            'Ngày Tạo',
            'Ngày Cập Nhật',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 20,
            'C' => 30,
            'D' => 15,
            'E' => 15,
            'F' => 10,
            'G' => 20,
            'H' => 20,
            'I' => 25,
            'J' => 40,
            'K' => 40,
        ];
    }


    //Sử dụng FromCollection
    /*
    public function collection()
    {
        return NhanVien::select('maNV', 'hoTenNV', 'diaChi', 'ngaySinh', 'sdt', 'gioiTinh', 'anh', 'maLoaiNV', 'email', 'created_at', 'updated_at')->get();
    }

    protected $hidden = ['matKhau'];

    public function map($row): array
    {
        return [
            $row->maNV,
            $row->hoTenNV,
            $row->diaChi,
            $row->ngaySinh,
            $row->sdt,
            $row->gioiTinh,
            $row->anh,
            $row->maLoaiNV,
            $row->email,
            $row->created_at,
            $row->updated_at,
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $cellRange = 'A2:K2';
                $color = '93ccea';
                $event->sheet->getDelegate()->getStyle($cellRange)->getFill()
                    ->setFillType(Fill::FILL_SOLID)
                    ->getStartColor()->setRGB($color);
            }
        ];
    }
    
    public function headings(): array
    {
        return [
            'Mã NV',
            'Họ và Tên',
            'Địa chỉ',
            'Ngày Sinh',
            'Số Điện Thoại',
            'Giới Tính',
            'Ảnh',
            'Mã Loại NV',
            'Email',
            'Ngày Tạo',
            'Ngày Cập Nhật',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 20,
            'C' => 30,
            'D' => 15,
            'E' => 15,
            'F' => 10,
            'G' => 20,
            'H' => 20,
            'I' => 25,
            'J' => 40,
            'K' => 40,
        ];
    }
    */
}
