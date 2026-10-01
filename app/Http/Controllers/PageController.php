<?php

namespace App\Http\Controllers;

use App\Models\Product;

class PageController extends Controller
{
    public function index()
    {
        return view('anasayfa');
    }

    public function hakkinda()
    {
        return view('hakkinda');
    }

    public function urunler()
    {
        $urunler = Product::all();

        return view('urunler', ['urunler' => $urunler]);
    }
}