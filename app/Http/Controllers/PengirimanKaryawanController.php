<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengiriman;

class PengirimanKaryawanController extends Controller
{
    public function index(){
        $pengiriman = Pengiriman::selectRaw("id, nama_penerima, alamat_pengiriman, nama_barang")->where('nama_pengirim', 
            auth()->user()->nama_karyawan)->get();
        return view('pengirimanKaryawan.index', compact('pengiriman'));
    }
}
