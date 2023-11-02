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
        Schema::create('dich_vus', function (Blueprint $table) {
            $table->string('maDV', 10)->primary();
            $table->string('tenDV', 255);
            $table->text('moTa')->nullable();
            $table->string('anh', 255)->default('defaultavt.png');
            $table->string('maLoaiDV', 10);
            $table->float('xepLoai')->nullable();
            $table->string('sdtDV', 20);
            $table->text('diaChiDV');
            $table->foreign('maLoaiDV')->references('maLoaiDV')->on('loai_dich_vus');
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
        Schema::dropIfExists('dich_vus');
    }
};
