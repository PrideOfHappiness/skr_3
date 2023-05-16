<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengiriman;

class PengirimanController extends Controller
{
    public function index(){
        $pengiriman = Pengiriman::paginate(20);
        return view('pengiriman.index', compact('pengiriman'));
    }

    public function create(){
        $konsumen = Konsumen::selectRaw("id, kode_konsumen, nama, concat(konsumen.kode_konsumen, ' - ', konsumen.nama) as konsumen")
            ->get();
        $barang = Barang::selectRaw("id, kode_barang, nama_barang, harga, concat(barang.kode_barang, ' - ', barang.nama_barang) 
            as barang")->get();
        return view('pengiriman.create', compact('konsumen', 'barang'));
    }
}
