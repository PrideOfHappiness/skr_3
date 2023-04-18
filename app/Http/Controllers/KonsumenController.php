<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konsumen;
use App\Models\Wilayah;

class KonsumenController extends Controller
{
    public function index(){
        $data = Konsumen::paginate(20);
        return view('konsumen.index', compact('data'));
    }

    public function create(){
        $wilayah = Wilayah::selectRaw("kode_wilayah, nama_wilayah, 
            concat(wilayah.kode_wilayah, '-',wilayah.nama_wilayah) as wilayah")->get();
        return view('konsumen.create', compact('wilayah'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'kode_konsumen' => 'required',
            'nama' => 'required',
            'kode_wilayah' => 'required',
            'alamat' => 'required',
            'kecamatan' => 'required',
            'no_ktp' => 'required',
            'no_telp' => 'required',
        ]);

        $konsumen = Konsumen::create([
            'kode_konsumen' => $request->kode_konsumen,
            'nama' => $request->nama_konsumen,
            'kode_wilayah' => $request->kode_wilayah,
            'alamat' => $request->alamat,
            'kecamatan' => $request->kecamatan,
            'no_ktp' => $request->no_ktp,
            'no_telp' => $request->no_telp,
        ]);

        return redirect()->route('konsumen.index')
            ->with('success', 'Data Konsumen berhasil ditambahkan!');
    }

    public function show(Konsumen $konsumen){
        return view('konsumen.show', compact('konsumen'));
    }

    public function edit(Konsumen $konsumen){
        $wilayah = Wilayah::selectRaw("kode_wilayah, nama_wilayah, 
            concat(wilayah.kode_wilayah, '-',wilayah.nama_wilayah) as wilayah")->get();
        return view('konsumen.edit', compact('konsumen', 'wilayah'));
    }

    public function update(Request $request, $id){
        
    }

    public function destroy($id){
        $konsumen = Konsumen::find($id);
        $konsumen->delete();

        return redirect()->route('konsumen.index')
            ->with('success', 'Data Konsumen Berhasil Dihapus!');
    }
}
