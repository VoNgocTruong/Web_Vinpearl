<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class KhachHang extends Model
{
    use HasFactory;
    protected $primaryKey = 'maKH';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'maKH',
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
                return match ($attribute['gioiTinh']) {
                    1 => 'Nam',
                    0 => 'Nữ',
                    2 => 'Không muốn trả lời',
                    default => 'Chưa Cập Nhật',
                };
            }
        );
    }
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($khach_hang) {
            // Tạo mã khách hàng mới dựa trên mã khách hàng cuối cùng
            $lastCustomer = KhachHang::query()->orderBy('maKH', 'desc')->first();
            if ($lastCustomer) {
                $lastCode = $lastCustomer->maKH;
                $codeNumber = (int)substr($lastCode, 2) + 1;
            } else {
                $codeNumber = 1;
            }
            // Format mã khách hàng và gán vào model
            $khach_hang->maKH = 'KH' . str_pad($codeNumber, 6, '0', STR_PAD_LEFT);
            $userId = $khach_hang->maKH;
            if (request()->hasFile('anh')) {
                $image = request()->file('anh');
                $image->storeAs("public/images/user_avt/$userId", $khach_hang->anh);
            } else {
                $sourcePath = 'public/images/user_avt/defaultavt.png';
                $destinationDirectory = "public/images/user_avt/$userId";
                $destinationPath = "$destinationDirectory/defaultavt.png";
                Storage::copy($sourcePath, $destinationPath);
            }
        });
    }
    public function setNgaySinhAttribute($value)
    {
        $this->attributes['ngaySinh'] = date('Y-m-d', strtotime(str_replace('/', '-', $value)));
    }
    protected function getNgaySinh(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attribute)
            {
                return date('d/m/Y', strtotime($attribute['ngaySinh']));
            }
        );
    }
}
