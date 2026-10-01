<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index']);
Route::get('/hakkinda', [PageController::class, 'hakkinda']);
Route::get('/urunler', [PageController::class, 'urunler']);