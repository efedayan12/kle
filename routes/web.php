<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index']);
Route::get('/hakkinda', [PageController::class, 'hakkinda']);

Route::get('/urunler', [ProductController::class, 'index']);
Route::get('/urunler/ekle', [ProductController::class, 'create']);
Route::post('/urunler', [ProductController::class, 'store']);