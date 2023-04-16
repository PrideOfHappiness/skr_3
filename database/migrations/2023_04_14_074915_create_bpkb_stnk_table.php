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
        Schema::create('bpkb_stnk', function (Blueprint $table) {
            $table->string('kode_customer');
            $table->string('kode_barang');
            $table->string('nama_bpkb_stnk');
            $table->string('nama_customer');
            $table->string('alamat_customer');
            $table->date('tanggal_proses');
            $table->date('tanggal_ambil');
            $table->timestamps();

            $table->foreign('kode_barang')->references('kode_barang')->on('barang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bpkb_stnk');
    }
};
