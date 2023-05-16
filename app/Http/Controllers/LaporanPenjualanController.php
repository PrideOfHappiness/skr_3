<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;

class LaporanPenjualanController extends Controller
{
    public function getFormTanggal(){
        return view("laporanPenjualan/formPickData");
    }

    public function prosesTanggal(Request $request){
        $awal = Carbon::createFromFormat('Y-m-d H:i:s', $request->date('dataAwal'))->startOfDay();
        $akhir = Carbon::createFromFormat('Y-m-d H:i:s', $request->date('dataAkhir'))->endOfDay();

        $proses = Excel_Data::selectRaw('count(Nama_Barang) as count, Nama_Barang as nama')
            ->whereBetween('Tanggal_FJ', [$awal, $akhir])->groupBy('Nama_Barang')->get();

        $chartData = [];

        foreach($proses as $row){
            $chartData['label'][] = $row->nama;
            $chartData['jumlah'][] = (int) $row->count;
        }

        $chartData['chart_data'] = json_encode($chartData);
        return view('listSepedaMotor/hasilData', $chartData)
            ->with('awal', $awal)
            ->with('akhir', $akhir);
    }

    public function getSeluruhData(){
        $getData = Excel_Data::selectRaw('count(Nama_Barang) as countData, Nama_Barang as namaBarang')
            ->groupBy('Nama_Barang')->get();

        $chartTotal = [];

        foreach($getData as $barisData){
            $chartTotal['label'][] = $barisData->namaBarang;
            $chartTotal['count'][] = (int) $barisData->countData;
        }

        $chartTotal['chartTotal'] = json_encode($chartTotal);
        return view('listSepedaMotor/grafik', $chartTotal);
    }
}
