<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Auth;

// Landing Page (tanpa login)
Route::get('/', function () {
    return view('landing');
});

// Auth routes (login, register, dll)
Auth::routes();

// Halaman Home redirect ke Transaksi Kasir langsung
Route::get('/home', [HomeController::class, 'index'])->name('home');



// Grup route yang hanya bisa diakses jika login (auth)
Route::middleware(['auth'])->group(function () {
    // Produk - CRUD tanpa show
    Route::resource('produk', ProdukController::class)->except(['show']);

    // Kasir
    Route::get('/kasir', [KasirController::class, 'index'])->name('kasir.index');
    Route::post('/kasir/checkout', [KasirController::class, 'checkout'])->name('kasir.checkout');
    Route::post('/kasir/add-to-cart', [KasirController::class, 'addToCart'])->name('kasir.add');
    Route::post('/kasir/reset', [KasirController::class, 'resetCart'])->name('kasir.reset');

    // Nota transaksi
    Route::get('/kasir/nota/{id}', [KasirController::class, 'cetakNota'])->name('kasir.nota');

    // Laporan penjualan
    Route::get('/laporan', [KasirController::class, 'laporan'])->name('kasir.laporan');
});
