<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\KonsumenController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\LaporanPenjualanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () {
    return view('login');
});
//Auth dan Logout
Route::post('/login', [App\Http\Controllers\AuthController::class, 'loginDasar'])->name('login');
Route::middleware(['auth'])->group(function(){
    Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
}); 

//Karyawan
Route::middleware(['Karyawan'])->group(function() {
    Route::get('/dashboardKaryawan', function(){
        return view('dashboard/dashboardKaryawan');
    });
    Route::resource('konsumen', KonsumenController::class);
    Route::resource('finance', FinanceController::class);
    Route::resource('penjualan', PenjualanController::class);
    Route::get('/penjualan/{id}/cetak_fj', [PenjualanController::class, 'download']);
    Route::resource('pengiriman', PengirimanController::class);
});

//Admin
Route::middleware(['Admin'])->group(function() {
    Route::get('/dashboardAdmin', function(){
        return view('dashboard/dashboardAdmin');
    });
    Route::resource('karyawan', KaryawanController::class);
    Route::resource('wilayah', WilayahController::class);
    Route::resource('barang', BarangController::class);
});

//Pemilik
Route::middleware(['Pemilik'])->group(function() {
    Route::get('/dashboardPemilik', function(){
        return view('dashboard/dashboardPemilik');
    });
    Route::get('/listMotor/pilihTanggal', [LaporanPenjualanController::class, 'getFormTanggal'])->name('pilihTanggalMotor');
    Route::post('/listMotor/prosesDataSepedaMotor', [LaporanPenjualanController::class, 'prosesTanggal'])->name('prosesDataMotor');
    Route::get('/listMotor/allData', [LaporanPenjualanController::class, 'getSeluruhData'])->name('getAllMotorData');

});


