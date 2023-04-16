<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Models\User;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function loginDasar(Request $request){
        $input = $request->only('kode_karyawan', 'password');
        $data = User::where('kode_karyawan', $request->kode_karyawan)->get('id');

        if(Auth::attempt($input) && Auth::user()->status == 'Karyawan'){
            return redirect()->intended('dashboardKaryawan');
        } else if(Auth::attempt($input) && Auth::user()->status == 'Admin'){
            return redirect()->intended('dashboardAdmin');
        }else if(Auth::attempt($input) && Auth::user()->status == 'Pemilik'){
            return redirect()->intended('dashboardPemilik');
        } else{
            return redirect()->route('login')
               ->with('error', 'Maaf, Email dan / Password yang dimasukkan salah!'); 
        }
    }
    public function karyawanLogin(Request $request){
        $input = $request->all();

        $this->validate($request, [
            'kode_karyawan' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($input) && auth()->user()->status == 'Karyawan'){
            return redirect()->intended('dashboardKaryawan');
        } else{
            return redirect()->route('login')
               ->with('error', 'Maaf, Email dan / Password yang dimasukkan salah!'); 
        }
    }

    public function adminLogin(Request $request){
        $input = $request->all();

        $this->validate($request, [
            'kode_karyawan' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($input) && auth()->user()->status == 'Admin'){
            return redirect()->intended('dashboardAdmin');
        } else{
            return redirect()->route('login')
               ->with('error', 'Maaf, Email dan / Password yang dimasukkan salah!'); 
    }
}

    public function pemilikLogin(Request $request){
        $input = $request->all();

        $this->validate($request, [
            'kode_karyawan' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($input) && auth()->user()->status == 'Admin'){
            return redirect()->intended('dashboardAdmin');
        } else{
            return redirect()->route('login')
               ->with('error', 'Maaf, Email dan / Password yang dimasukkan salah!');
    }
}
    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
