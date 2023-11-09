<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    use HasFactory;
    protected $primaryKey = 'maNV';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'maNV',
        'hoTenNV',
        'diaChi',
        'ngaySinh',
        'sdt',
        'gioiTinh',
        'anh',
        'maLoaiNV',
        'email',
        'matKhau',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($nhan_viens) {
            // Tạo mã nhân viên mới dựa trên mã nhân viên cuối cùng
            $lastCustomer = NhanVien::query()->orderBy('maNV', 'desc')->first();
            if ($lastCustomer) {
                $lastCode = $lastCustomer->maNV;
                $codeNumber = (int)substr($lastCode, 2) + 1;
            } else {
                $codeNumber = 1;
            }
            // Format mã nhân viên và gán vào model
            $nhan_viens->maNV = 'NV' . str_pad($codeNumber, 6, '0', STR_PAD_LEFT);
            
            $employeeID = $nhan_viens->maNV;
            if (request()->hasFile('anh')) {
                $image = request()->file('anh');
                $image->storeAs("public/images/employee_avt/$employeeID", $nhan_viens->anh);
            } else {
                $sourcePath = 'public/images/employee_avt/defaultavt.png';
                $destinationDirectory = "public/images/employee_avt/$employeeID";
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

    public function getTenLoai()
    {
        return $this->belongsTo(LoaiNhanVien::class, 'maLoaiNV', 'maLoaiNV');
    }

}
