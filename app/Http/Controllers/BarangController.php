<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index(){
        $dataBarang = Barang::paginate(20);
        return view('barang.index', compact('dataBarang'));
    }

    public function create(){
        return view('barang.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'warna_barang' => 'required',
            'harga' => 'required',
            'nama_foto' => 'mimes:jpg,jpeg,png|max:2048',
        ]);

        if($request->hasFile('nama_foto')){
            $foto_motor = $request->file('nama_foto');
            $namaFile = $foto_motor->getClientOriginalName();
            $foto_motor->move('upload/motor/', $namaFile);
        }

        $barang = Barang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'warna' => $request->warna_barang,
            'harga' => $request->harga,
            'namaFile' => $namaFile,
        ]);

        return redirect()->route('barang.index')
            ->with('success', 'Data Barang berhasil ditambahkan!');
    }

    public function show($id){
        $dataBarang = Barang::find($id);
        return view('barang.show', compact('dataBarang'));
    }
}
