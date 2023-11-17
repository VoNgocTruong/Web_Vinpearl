<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    use HasFactory;
    protected $table = 'hoadons';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'maHD';
    protected $fillable = ['maHD', 'maKH', 'maNV', 'ngayThanhToan', 'SDT', 'email'];

    public static function generateMaHD()
    {
        $last = HoaDon::query()->orderBy('maHD', 'desc')->first();
        if ($last) {
            $lastCode = $last->maHD;
            $codeNumber = (int)substr($lastCode, 2) + 1;
        } else {
            $codeNumber = 1;
        }
        // Format mã loại nhân viên
        return 'HD' . str_pad($codeNumber, 6, '0', STR_PAD_LEFT);
    }
}
