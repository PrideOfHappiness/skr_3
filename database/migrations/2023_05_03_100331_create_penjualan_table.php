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
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kode_customer')->unsigned();
            $table->bigInteger('kode_wilayah')->unsigned();
            $table->bigInteger('kode_gudang')->unsigned();
            $table->bigInteger('kode_karyawan')->unsigned();
            $table->bigInteger('kode_barang')->unsigned();
            $table->string('no_mesin', 12)->unique();
            $table->string('no_rangka', 14)->unique();
            $table->string('tahun_rakit', 4);
            $table->string('warna_sepeda_motor', 50);
            $table->string('nama_barang', 100);
            $table->string('jenis_bayar', 18);
            $table->string('nama_customer', 100);
            $table->string('alamat_customer');
            $table->string('no_ktp_customer', 16);
            $table->string('foto_ktp_customer');
            $table->string('no_telp_customer', 15);
            $table->string('nama_bpkb_stnk', 100);
            $table->string('alamat_bpkb_stnk');
            $table->string('no_ktp_bpkb_stnk', 16);
            $table->string('nama_karyawan');
            $table->string('komisi');
            $table->string('nama_dealer');
            $table->timestamps();

            $table->foreign('kode_customer')->references('id')->on('konsumen');
            $table->foreign('kode_karyawan')->references('id')->on('users');
            $table->foreign('kode_barang')->references('id')->on('barang');
            $table->foreign('kode_gudang')->references('id')->on('gudang');
            $table->foreign('kode_wilayah')->references('id')->on('wilayah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualan');
    }
};
