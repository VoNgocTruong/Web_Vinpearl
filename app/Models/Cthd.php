<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cthd extends Model
{
    use HasFactory;
    protected $table = 'cthd';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey  = ['maHD', 'maVe'];
}
