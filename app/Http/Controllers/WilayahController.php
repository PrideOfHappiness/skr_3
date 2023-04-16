<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wilayah;

class WilayahController extends Controller
{
    public function index(){
        $data = Wilayah::all();
        return view('wilayah.index', compact('data'));
    }

    public function create(){
        return view('wilayah.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'kode_wilayah' => 'required',
            'nama_wilayah' => 'required',
        ]);

        $wilayah = Wilayah::create([
            'kode_wilayah' => $request->kode_wilayah,
            'nama_wilayah' => $request->nama_wilayah,
        ]);

        return redirect()->route('wilayah.index')
            ->with('success', 'Data Wilayah berhasil ditambahkan!');
    }

    public function show($kode_wilayah){
        $wilayah = Wilayah::where('kode_wilayah', $kode_wilayah)->first();
        return view('wilayah.show', compact('wilayah'));
    }
}
