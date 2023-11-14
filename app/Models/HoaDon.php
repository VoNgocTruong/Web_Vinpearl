<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    use HasFactory;
    protected $table = 'hoadon';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'maHD';
    protected $elements = ['maHD', 'maKH', 'maNV', 'ngayThanhToan', 'SDT', 'email'];
}
