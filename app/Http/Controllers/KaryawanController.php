<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class KaryawanController extends Controller
{
    public function index(){
        $dataKaryawan = User::paginate(10);
        return view('karyawan.index', compact('dataKaryawan'));
    }

    public function create(){
        return view('karyawan.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'nama_karyawan' => 'required',
            'alamat' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
        ]);

        //Potong nama dan generate angka random
        $nama = $request->nama_karyawan;
        $kodeNama = strtoupper(substr($nama, 0, 2) . substr(strrchr($nama, " "), 1, 1));
        $randomNumber = rand(1,9999);
        $hasilKode = $kodeNama . $randomNumber;

        //cek password
        $password1 = $request->password;
        $password2 = $request->confirm_password;

        if($password1 == $password2){
            $user = User::create([
                'kode_karyawan'=> $hasilKode,
                'nama_karyawan'=> $request->nama_karyawan,
                'alamat'=> $request->alamat,
                'gender'=> $request->gender,
                'status'=> $request->status,
                'no_telp'=> $request->no_telp,
                'email'=> $request->email,
                'password'=> bcrypt($password1),
            ]);
            return redirect()->route('karyawan.index')
            ->with('success', 'Data User berhasil ditambahkan!');
        } else if($password1 != $password2){
            return redirect()->route('karyawan.index')
                ->with('error', 'Password tidak cocok!');
        } else{
            return redirect()->route('karyawan.create')
                ->with('error', "Wajib masukkan password 2!");
        }   
    }

    public function show(User $karyawan){
        return view('karyawan.show', compact('karyawan'));
    }

    public function edit(User $karyawan){
        return view('karyawan.edit',compact('karyawan'));
    }

    public function update(Request $request, $id){
        $karyawan = User::findorFail($id);

        $this->validate($request,[
            'kode_karyawan' => 'required',
            'nama_karyawan' => 'required',
            'alamat' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $input = $request->all();
        $karyawan->fill($input)->save();

        return redirect()->route('karyawan.index')
            ->with('success', 'Data User berhasil diubah!');
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();

        return redirect()->route('karyawan.index')
            ->with('success', 'Data Berhasil Dihapus!');
    }
}
