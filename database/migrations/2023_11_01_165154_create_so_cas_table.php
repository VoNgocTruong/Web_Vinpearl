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
        Schema::create('so_cas', function (Blueprint $table) {
            $table->string('maCa', 10)->primary();
            $table->string('maNV', 10);
            $table->float('soCa');
            $table->foreign('maNV')->references('maNV')->on('nhan_viens');
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
        Schema::dropIfExists('so_cas');
    }
};
