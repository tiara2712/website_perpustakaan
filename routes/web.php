<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RakController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengembalianController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login' , [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', [DashboardController::class, 'index']);
    
    Route::get('/kategori', [KategoriController::class, 'index']);
    Route::post('/kategori/store', [KategoriController::class, 'store']);
    Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit']);
    Route::put('/kategori/{id}', [KategoriController::class, 'update']);
    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy']);
    Route::get('/rak', [RakController::class, 'index']);
    Route::post('/rak/store', [RakController::class, 'store']);
    Route::get('/rak/{id}/edit', [RakController::class, 'edit']);
    Route::put('/rak/{id}', [RakController::class, 'update']);
    Route::delete('/rak/{id}', [RakController::class, 'destroy']);

    Route::get('/buku', [BukuController::class, 'index']);
    Route::post('/buku/store', [BukuController::class, 'store']);
    Route::get('/buku/{id}/edit', [BukuController::class, 'edit']);
    Route::put('/buku/{id}', [BukuController::class, 'update']);
    Route::delete('/buku/{id}', [BukuController::class, 'destroy']);

    Route::get('/pinjaman', [PinjamanController::class, 'index']);
    Route::post('/pinjaman/store', [PinjamanController::class, 'store'])->name('pinjaman.store');
    Route::get('/pinjaman/{pinjaman}/edit', [PinjamanController::class, 'edit'])->name('pinjaman.edit'); 
    Route::put('/pinjaman/{id}', [PinjamanController::class, 'update'])->name('pinjaman.update');
    Route::put('/pinjaman/{id}/status', [PinjamanController::class, 'updateStatus'])->name('pinjaman.updateStatus');
    Route::delete('/pinjaman/{id}', [PinjamanController::class, 'destroy'])->name('pinjaman.destroy');
    
    Route::resource('pengembalian', PengembalianController::class);
});