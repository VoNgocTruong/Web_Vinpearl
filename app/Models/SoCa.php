<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoCa extends Model
{
    use HasFactory;
    protected $primaryKey = 'maCa';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'maCa',
        'maNV',
        'soCa',
    ];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($so_cas) {
            // Tạo mã loại nhân viên mới dựa trên mã loại nhân viên cuối cùng
            $lastTypeEmployee = SoCa::query()->orderBy('maCa', 'desc')->first();
            if ($lastTypeEmployee) {
                $lastCode = $lastTypeEmployee->maCa;
                $codeNumber = (int)substr($lastCode, 2) + 1;
            } else {
                $codeNumber = 1;
            }
            // Format mã loại nhân viên và gán vào model
            $so_cas->maCa = 'SC' . str_pad($codeNumber, 6, '0', STR_PAD_LEFT);
            
        });
    }

    public function getTenNV()
    {
        return $this->belongsTo(NhanVien::class, 'maNV', 'maNV');
    }
}
