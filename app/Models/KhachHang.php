<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    use HasFactory;
    protected $fillable = [
        'hoTenKH',
        'sdt',
        'diaChi',
        'ngaySinh',
        'gioiTinh',
        'email',
        'matKhau',
        'anh',
    ];
    protected function genderName(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attribute)
            {
                return $attribute['gioiTinh'] == 1 ? 'Nam' : 'Nữ';
            }
        );
    }
}
