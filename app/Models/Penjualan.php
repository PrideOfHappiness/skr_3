<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = "penjualan";

    protected $fillable = [
        'kode_customer',
        'kode_wilayah',
        'kode_gudang',
        'kode_karyawan',
        'kode_barang',
        'no_mesin',
        'no_rangka',
        'tahun_rakit',
        'warna_sepeda_motor',
        'nama_barang',
        'jenis_bayar',
        'nama_customer',
        'alamat_customer',
        'no_ktp_customer',
        'foto_ktp_customer',
        'no_telp_customer',
        'nama_bpkb_stnk',
        'alamat_bpkb_stnk',
        'no_ktp_bpkb_stnk',
        'nama_karyawan',
        'komisi',
        'nama_dealer',
    ];

    public function kode_customer(): BelongsTo
    {
        return $this->belongsTo(Konsumen::class, 'kode_customer');
    }
}
