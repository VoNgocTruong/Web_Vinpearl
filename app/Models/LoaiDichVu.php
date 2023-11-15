<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class LoaiDichVu extends Model
{
    use HasFactory;
    protected $primaryKey = 'maLoaiDV';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'maLoaiDV',
        'tenLoai',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($loai_dich_vu) {
            // Tạo mã khách hàng mới dựa trên mã khách hàng cuối cùng
            $lastCustomer = LoaiDichVu::query()->orderBy('maLoaiDV', 'desc')->first();
            if ($lastCustomer) {
                $lastCode = $lastCustomer->maLoaiDV;
                $codeNumber = (int)substr($lastCode, 3) + 1;
            } else {
                $codeNumber = 1;
            }
            // Format mã khách hàng và gán vào model
            $loai_dich_vu->maLoaiDV = 'LDV' . str_pad($codeNumber, 6, '0', STR_PAD_LEFT);
        });
    }
}
