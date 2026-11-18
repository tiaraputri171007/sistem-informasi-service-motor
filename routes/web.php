<?php

use Illuminate\Support\Facades\Route;
use App\Models\Pelanggan;
use App\Models\Kendaraan;
use App\Models\DaftarService;
use App\Models\DataService;
use App\Models\PembayaranService;

use App\Http\Controllers\PelangganController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\DaftarServiceController;
use App\Http\Controllers\DataServiceController;
use App\Http\Controllers\PembayaranServiceController;

Route::get('/', function () {
    $jumlahPelanggan = Pelanggan::count();
    $jumlahKendaraan = Kendaraan::count();
    $jumlahDaftarService = DaftarService::count();
    $jumlahDataService = DataService::count();
    $jumlahPembayaran = PembayaranService::count();

    $totalPemasukan = PembayaranService::sum('jumlah_biaya');

    $serviceTerbaru = DaftarService::with([
        'pelanggan',
        'kendaraan'
    ])->latest()->take(5)->get();

    return view('dashboard', compact(
        'jumlahPelanggan',
        'jumlahKendaraan',
        'jumlahDaftarService',
        'jumlahDataService',
        'jumlahPembayaran',
        'totalPemasukan',
        'serviceTerbaru'
    ));
})->name('dashboard');

Route::resource('pelanggan', PelangganController::class);
Route::resource('kendaraan', KendaraanController::class);
Route::resource('daftar-service', DaftarServiceController::class);
Route::resource('data-service', DataServiceController::class);
Route::resource('pembayaran-service', PembayaranServiceController::class);
