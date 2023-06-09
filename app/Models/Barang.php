<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'warna',
        'harga',
        'namaFile',
    ];

    public function kode_barang_penjualan(){
        return $this->hasMany(Penjualan::class, "kode_barang");
    }

    public function kode_barang_pengiriman(){
        return $this->hasMany(Pengiriman::class, "kode_barang");
    }
}
