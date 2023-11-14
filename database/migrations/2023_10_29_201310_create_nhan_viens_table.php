<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhan_viens', function (Blueprint $table) {
            $table->string('maNV', 10)->primary();
            $table->string('hoTenNV', 255);
            $table->text('diaChi');
            $table->date('ngaySinh');
            $table->string('sdt',20);
            $table->string('gioiTinh',10);
            $table->string('anh',255);
            $table->string('maLoaiNV',10);
            $table->string('email',255);
            $table->string('matKhau', 255);
            $table->foreign('maLoaiNV')->references('maLoaiNV')->on('loai_nhan_viens');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhan_viens');
    }
};
