<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index(){
        $dataBarang = Barang::paginate(20);
        return view('barang.index', compact('data'));
    }

    public function create(){
        return view('barang.create');
    }
}
