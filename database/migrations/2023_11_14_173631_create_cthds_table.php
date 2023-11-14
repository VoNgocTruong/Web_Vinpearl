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
        Schema::create('cthd', function (Blueprint $table){
            $table->string('maHD', 10)->primary();
            $table->string('maVe', 10);
            $table->integer('soLuong', 11);
            $table->integer('giaTien', 11);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cthds');
    }
};
