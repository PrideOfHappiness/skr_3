<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;

    protected $table = 'finance';

    protected $fillable = [
        'kode_financing_customer',
        'nama_penanggung',
        'kode_konsumen',
    ];

    public function konsumen_finance(){
        return $this->belongsTo(Konsumen::class, "kode_konsumen");
    }
    
}
