<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konsumen;

class KonsumenController extends Controller
{
    public function index(){
        $data = Konsumen::paginate(20);
        return view('konsumen.index', compact('data'));
    }

    public function create(){
        return view('konsumen.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'kode_konsumen' => 'required',
            'nama' => 'required',
            'kode_wilayah' => 'required',
            'nama_wilayah' => 'required',
            'alamat' => 'required',
            'kecamatan' => 'required',
            'no_ktp' => 'required',
            'no_telp' => 'required',
        ]);

        $konsumen = Konsumen::create([
            'kode_konsumen' => $request->kode_konsumen,
            'nama' => $request->nama_konsumen,
            'kode_wilayah' => $request->kode_wilayah,
            'nama_wilayah' => $request->nama_wilayah,
            'alamat' => $request->alamat,
            'kecamatan' => $request->kecamatan,
            'no_ktp' => $request->no_ktp,
            'no_telp' => $request->no_telp,
        ]);

        return redirect()->route('konsumen.index')
            ->with('success', 'Data Konsumen berhasil ditambahkan!');
    }
}
