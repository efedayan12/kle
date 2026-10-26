<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/hakkinda', [PageController::class, 'about'])->name('about');

Route::middleware('guest')->group(function () {
    Route::get('/kayit', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/kayit', [AuthController::class, 'register'])->name('register.store');
    Route::get('/giris', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/giris', [AuthController::class, 'login'])->name('login.store');
});

Route::middleware('logged.in')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::get('/urunler/ekle', [ProductController::class, 'create'])->name('products.create');
    Route::post('/urunler', [ProductController::class, 'store'])->name('products.store');
    Route::get('/urunler/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/urunler/{product}/duzenle', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/urunler/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/urunler/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::post('/cikis', [AuthController::class, 'logout'])->name('logout');
});
