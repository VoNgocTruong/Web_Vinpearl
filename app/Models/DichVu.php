<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DichVu extends Model
{
    use HasFactory;
    protected $primaryKey = 'maDV';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'maDV',
        'tenDV',
        'moTa',
        'anh',
        'maLoaiDV',
        'xepLoai',
        'sdtDV',
        'diaChiDV',
    ];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($dich_vu) {
            // Tạo mã khách hàng mới dựa trên mã khách hàng cuối cùng
            $lastService = DichVu::query()->orderBy('maDV', 'desc')->first();
            if ($lastService) {
                $lastCode = $lastService->maDV;
                $codeNumber = (int)substr($lastCode, 2) + 1;
            } else {
                $codeNumber = 1;
            }
            // Format mã khách hàng và gán vào model
            $dich_vu->maDV = 'DV' . str_pad($codeNumber, 6, '0', STR_PAD_LEFT);
            $serviceID = $dich_vu->maDV;
            if (request()->hasFile('anh')) {
                $image = request()->file('anh');
                $image->storeAs("public/images/service_avt/$serviceID", $dich_vu->anh);
            } else {
                $sourcePath = 'public/images/service_avt/defaultavt.png';
                $destinationDirectory = "public/images/service_avt/$serviceID";
                $destinationPath = "$destinationDirectory/defaultavt.png";
                Storage::copy($sourcePath, $destinationPath);
            }
        });
    }

    public function getTenDV(){
        return $this->belongsTo(LoaiDichVu::class, 'maLoaiDV', 'maLoaiDV');
    }
}
