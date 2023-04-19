<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Finance;
use App\Models\Konsumen;

class FinanceController extends Controller
{
    public function index(){
        $dataFinance = Finance::paginate(20);
        return view('finance.index', compact('data'));
    }

    public function create(){
        $konsumen = Konsumen::selectRaw("id, kode_konsumen, nama, concat(konsumen.kode_konsumen, '-' , 
            konsumen.nama as konsumenData")->get();
        return view('finance.create', compact('konsumen'));
    }

    public function store(Request $request){
        
    }
}
