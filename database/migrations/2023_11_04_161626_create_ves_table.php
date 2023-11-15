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
        Schema::create('ves', function (Blueprint $table) {
            $table->string('maVe', 10)->primary();
            $table->string('maDV', 10);
            $table->boolean('loaiVe');
            $table->decimal('giaTien',  $precision = 13, $scale = 4);
            $table->foreign('maDV')->references('maDV')->on('dich_vus');
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
        Schema::dropIfExists('ves');
    }
};
