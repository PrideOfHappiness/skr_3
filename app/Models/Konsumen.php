<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsumen extends Model
{
    use HasFactory;

    protected $table = 'konsumen';

    protected $fillable = [
        'kode_konsumen',
        'nama',
        'wilayah',
        'alamat',
        'kecamatan',
        'no_ktp',
        'no_telp',
    ];

    public function wilayah_konsumen(){
        return $this->belongsTo(Wilayah::class, "wilayah");
    }
}
