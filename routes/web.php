<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/hakkinda', [PageController::class, 'hakkinda']);

Route::middleware('guest')->group(function () {
    Route::get('/kayit', [AuthController::class, 'kayitFormu']);
    Route::post('/kayit', [AuthController::class, 'kayit']);
    Route::get('/giris', [AuthController::class, 'girisFormu']);
    Route::post('/giris', [AuthController::class, 'giris']);
});

Route::middleware('giris')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/urunler/ekle', [ProductController::class, 'create']);
    Route::post('/urunler', [ProductController::class, 'store']);
    Route::get('/urunler/{urun}', [ProductController::class, 'show']);
    Route::get('/urunler/{urun}/duzenle', [ProductController::class, 'edit']);
    Route::put('/urunler/{urun}', [ProductController::class, 'update']);
    Route::delete('/urunler/{urun}', [ProductController::class, 'destroy']);
    Route::post('/cikis', [AuthController::class, 'cikis']);
});