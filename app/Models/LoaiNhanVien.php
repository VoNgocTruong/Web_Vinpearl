<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiNhanVien extends Model
{
    use HasFactory;
    protected $primaryKey = 'maLoaiNV';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'maLoaiNV',
        'tenLoai',
        'luongCoBan',
    ];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($loai_nhan_viens) {
            // Tạo mã loại nhân viên mới dựa trên mã loại nhân viên cuối cùng
            $lastTypeEmployee = LoaiNhanVien::query()->orderBy('maLoaiNV', 'desc')->first();
            if ($lastTypeEmployee) {
                $lastCode = $lastTypeEmployee->maLoaiNV;
                $codeNumber = (int)substr($lastCode, 3) + 1;
            } else {
                $codeNumber = 1;
            }
            // Format mã loại nhân viên và gán vào model
            $loai_nhan_viens->maLoaiNV = 'LNV' . str_pad($codeNumber, 6, '0', STR_PAD_LEFT);
        });
    }
    // protected function getLuongFormattedAttribute(): Attribute
    // {
    //     return Attribute::make(
    //         get: function ($value, $attribute)
    //         {
    //             return number_format($attribute['luongCoBan'], 0, ',', '.') . ' VNĐ';
    //         }
    //     );
    // }
}
