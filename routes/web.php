<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaketWisataController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\PemanduController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\KomentarController;

Route::get('/', function () {
    return view('index');
});

Route::resource('paket-wisata', PaketWisataController::class)->parameters([
    'paket-wisata' => 'paketWisata'
]);

Route::resource('pengunjung', PengunjungController::class);
Route::resource('pemandu', PemanduController::class);
Route::resource('fasilitas', FasilitasController::class)->parameters([
    'fasilitas' => 'fasilitas'
]);
Route::resource('komentar', KomentarController::class);