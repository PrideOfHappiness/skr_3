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
        Schema::create('konsumen', function (Blueprint $table) {
            $table->id();
            $table->string('kode_konsumen', 8)->unique();
            $table->string('nama');
            $table->string('kode_wilayah', 7)->nullable();
            $table->string('alamat');
            $table->string('kecamatan');
            $table->string('no_ktp', 16)->nullable();
            $table->string('no_telp', 15)->nullable();
            $table->timestamps();

            $table->foreign('kode_wilayah')->references('kode_wilayah')->on('wilayah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('konsumen');
    }
};
