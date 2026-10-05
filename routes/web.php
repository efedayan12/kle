<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index']);
Route::get('/hakkinda', [PageController::class, 'hakkinda']);

Route::get('/urunler', [ProductController::class, 'index']);
Route::get('/urunler/ekle', [ProductController::class, 'create']);
Route::post('/urunler', [ProductController::class, 'store']);
Route::get('/urunler/{urun}', [ProductController::class, 'show']);
Route::get('/urunler/{urun}/duzenle', [ProductController::class, 'edit']);
Route::put('/urunler/{urun}', [ProductController::class, 'update']);
Route::delete('/urunler/{urun}', [ProductController::class, 'destroy']);