<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Wilayah;
use App\Models\Barang;
use App\Models\Gudang;
use App\Models\User;
use App\Models\Konsumen;
use PDF;

class PenjualanController extends Controller
{
    public function index(){
        $dataPenjualan = Penjualan::paginate(20);
        return view('penjualan.index', compact('dataPenjualan'));
    }

    public function create(){
        $konsumen = Konsumen::selectRaw("id, kode_konsumen, nama, concat(konsumen.kode_konsumen, ' - ', konsumen.nama) as konsumen")
            ->get();
        $wilayah = Wilayah::selectRaw("id, kode_wilayah, nama_wilayah, concat(wilayah.kode_wilayah, ' - ', wilayah.nama_wilayah)
            as wilayah")->get();
        $barang = Barang::selectRaw("id, kode_barang, nama_barang, harga, concat(barang.kode_barang, ' - ', barang.nama_barang, 
            ' - ', ' Rp.', barang.harga) as barang")->get();
        $gudang = Gudang::selectRaw("id, kode_gudang, nama_gudang, concat(gudang.kode_gudang, ' - ', gudang.nama_gudang) as gudang
            ")->get();
        $karyawan = User::selectRaw("id, kode_karyawan, nama_karyawan, concat(users.kode_karyawan, ' - ', users.nama_karyawan) as karyawan
            ")->where('status', 'Karyawan')->get();
        return view('penjualan.create', compact('konsumen', 'wilayah', 'barang', 'karyawan', 'gudang')); 
    }

    public function store(Request $request){
        $this->validate($request, [
            'kode_konsumen' => 'required',
            'nama_konsumen' => 'required',
            'alamat_konsumen' => 'required',
            'kode_wilayah_konsumen' => 'required',
            'no_ktp_konsumen' => 'required',
            'foto_ktp_konsumen' => 'mimes:jpg,jpeg,png|max:2048',
            'no_telp_konsumen' => 'required',
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'kode_gudang_barang' => 'required',
            'warna_barang' => 'required',
            'tahun_rakit_barang' => 'required',
            'no_rangka_barang' => 'required',
            'no_mesin_barang' => 'required',
            'harga_barang_terjual' => 'required',
            'jenis_bayar_barang' => 'required',
            'kode_karyawan' => 'required',
            'nama_karyawan' => 'required',
            'nama_dealer' => 'required',
        ]);

        if($request->hasFile('foto_ktp_konsumen')){
            $foto_ktp = $request->file('foto_ktp_konsumen');
            $namaFileKtp = $foto_ktp->getClientOriginalName();
            $foto_ktp->move('upload/foto_ktp/', $namaFileKtp);
        }

        $penjualan = Penjualan::create([
            'kode_customer' => $request->kode_konsumen,
            'kode_wilayah' => $request->kode_wilayah_konsumen,
            'kode_gudang' => $request->kode_gudang_barang,
            'kode_karyawan' => $request->kode_karyawan,
            'kode_barang' => $request->kode_barang,
            'no_mesin' => $request->no_mesin_barang,
            'no_rangka' => $request->no_rangka_barang,
            'tahun_rakit' => $request->tahun_rakit_barang,
            'warna_sepeda_motor' => $request->warna_barang,
            'nama_barang' => $request->nama_barang,
            'jenis_bayar' => $request->jenis_bayar_barang,
            'nama_customer' => $request->nama_konsumen,
            'alamat_customer' => $request->alamat_konsumen,    
            'no_ktp_customer' => $request->no_ktp_konsumen,
            'foto_ktp_customer' => $namaFileKtp,
            'no_telp_customer' => $request->no_telp_konsumen,
            'nama_karyawan' => $request->nama_karyawan,
            'nama_dealer' => $request->nama_dealer,
            'harga_terjual' => $request->harga_barang_terjual,
        ]);

        return redirect()->route('penjualan.index')
            ->with('success', 'Data Penjualan Berhasil Ditambahkan!');
    }

    public function show($id){
        $penjualan = Penjualan::find($id);
        return view('penjualan.show', compact('penjualan'));
    }

    public function download($id){
        $dataPenjualan = Penjualan::find($id);
        $pdf = PDF::loadview('fakturJual', ['fj' => $dataPenjualan]);
        return $pdf->download('fakturJual-pdf');
    }
}
