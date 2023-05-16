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
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kode_barang')->unsigned();
            $table->bigInteger('kode_customer')->unsigned();
            $table->bigInteger('id_pengirim')->unsigned();
            $table->string('nama_penerima');
            $table->string('nama_barang');
            $table->string('nama_pengirim');
            $table->string('alamat_pengiriman');
            $table->string('status');
            $table->timestamps();

            $table->foreign('kode_barang')->references('id')->on('barang');
            $table->foreign('kode_customer')->references('id')->on('konsumen');
            $table->foreign('id_pengirim')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengiriman');
    }
};
