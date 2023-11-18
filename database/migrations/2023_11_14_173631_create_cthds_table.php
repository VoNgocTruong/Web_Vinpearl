<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('cthds', function (Blueprint $table){
            $table->string('maHD', 10);
            $table->string('maVe', 10);
            $table->float('soLuong');
            $table->string('giaTien');
            $table->string('status')->default('Đang xử lý');
            $table->primary(['maHD', 'maVe']);
            $table->foreign('maVe')->references('maVe')->on('ves');
            $table->foreign('maHD')->references('maHD')->on('hoadons');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cthds');
    }
};
