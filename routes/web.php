<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/produk', function () {
    return view('produk');
})->middleware(['auth', 'verified'])->name('produk');

Route::get('/pencatatan', function () {
    return view('pencatatan');
})->middleware(['auth', 'verified'])->name('pencatatan');

Route::get('/stok', function () {
    return view('stok');
})->middleware(['auth', 'verified'])->name('stok');

Route::get('/pelanggan', function () {
    return view('pelanggan');
})->middleware(['auth', 'verified'])->name('pelanggan');

Route::get('/laporan', function () {
    return view('laporan');
})->middleware(['auth', 'verified'])->name('laporan');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
