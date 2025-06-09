<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\StokController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::resource('produk', ProdukController::class);

    Route::resource('stok', StokController::class);



    Route::get('/pencatatan', function () {
        return view('pencatatan');
    })->name('pencatatan');

    Route::get('/register', function () {
        return view('auth.register'); // atau sesuaikan dengan view register kamu
    })->name('register');
});

Route::middleware(['auth', 'verified', 'role:owner'])->group(function () {
    Route::get('/pelanggan', function () {
        return view('pelanggan');
    })->name('pelanggan');

    Route::get('/laporan', function () {
        return view('laporan');
    })->name('laporan');
});


require __DIR__.'/auth.php';
