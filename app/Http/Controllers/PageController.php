<?php

namespace App\Http\Controllers;

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
        $urunler = [
            ['ad' => 'Klavye', 'fiyat' => 450.50, 'stok' => 12, 'kategori' => 'elektronik'],
            ['ad' => 'Mouse',  'fiyat' => 220.00, 'stok' => 0,  'kategori' => 'elektronik'],
            ['ad' => 'Tişört', 'fiyat' => 180.00, 'stok' => 5,  'kategori' => 'giyim'],
        ];

        return view('urunler', ['urunler' => $urunler]);
    }
}