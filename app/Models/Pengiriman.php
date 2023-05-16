<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;

    protected $table = 'pengiriman';

    protected $fillable = [
        'kode_barang',
        'kode_customer',
        'id_pengirim',
        'nama_penerima',
        'nama_barang',
        'nama_pengirim',
        'alamat_pengiriman',
        'status',
    ];

    public function kode_barang(){
        return $this->belongsTo(Barang::class, "kode_barang");
    }

    public function kode_customer(){
        return $this->belongsTo(Konsumen::class, "kode_customer");
    }

    public function id_pengirim(){
        return $this->belongsTo(User::class, "id_pengirim");
    }
}
