<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use HasFactory;

    protected $table = "wilayah";

    protected $fillable = [
        'kode_wilayah',
        'nama_wilayah',
    ];

    /**
     * Get all of the wilayahKonsumen for the Wilayah
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function wilayahKonsumen(): HasMany
    {
        return $this->hasMany(Konsumen::class, 'kode_wilayah');
    }
}
