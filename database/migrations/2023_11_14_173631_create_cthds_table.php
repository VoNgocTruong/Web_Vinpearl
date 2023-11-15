<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('cthd', function (Blueprint $table){
            $table->string('maHD', 10)->primary();
            $table->string('maVe', 10);
            $table->float('soLuong');
            $table->string('giaTien');
            $table->foreign('maVe')->references('maVe')->on('ves');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cthds');
    }
};
