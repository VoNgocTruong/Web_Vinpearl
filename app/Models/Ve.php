<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class Ve extends Model
{
    use HasFactory;
    protected $primaryKey = 'maVe';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'maVe',
        'maDV',
        'loaiVe',
        'giaTien',
    ];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($ves) {
            // Tạo mã vé mới dựa trên mã vé cuối cùng
            $lastTicket = Ve::query()->orderBy('maVe', 'desc')->first();
            if ($lastTicket) {
                $lastCode = $lastTicket->maVe;
                $codeNumber = (int)substr($lastCode, 2) + 1;
            } else {
                $codeNumber = 1;
            }
            // Format mã vé và gán vào model
            $ves->maVe = 'VE' . str_pad($codeNumber, 6, '0', STR_PAD_LEFT);
        });
    }
    
    public function getTenDichVu()
    {
        return $this->belongsTo(DichVu::class, 'maDV', 'maDV');
    } 
}
