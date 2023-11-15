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
        Schema::create('loai_nhan_viens', function (Blueprint $table) {
            $table->string('maLoaiNV', 10)->primary();
            $table->string('tenLoai', 255);
            $table->decimal('luongCoBan',  $precision = 13, $scale = 0);
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
        Schema::dropIfExists('loai_nhan_viens');
    }
};
