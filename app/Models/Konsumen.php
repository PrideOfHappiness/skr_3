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
        'kode_wilayah',
        'nama_wilayah',
        'alamat',
        'kecamatan',
        'no_ktp',
        'no_telp',
    ];

    /**
     * The kode_wilayah_konsumen that belong to the Konsumen
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function kode_wilayah_konsumen(): BelongsToMany
    {
        return $this->belongsToMany(Wilayah::class, 'kode_wilayah');
    }
}
