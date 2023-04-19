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
        Schema::create('finance', function (Blueprint $table) {
            $table->id();
            $table->string('kode_financing_customer', 8)->unique();
            $table->string('nama_penanggung');
            $table->bigInteger('kode_konsumen')->unsigned();
            $table->timestamps();

            $table->foreign('kode_konsumen')->references('id')->on('konsumen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('finance');
    }
};
