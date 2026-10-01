<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $urunler = Product::all();

        return view('urunler.index', ['urunler' => $urunler]);
    }

    public function create()
    {
        return view('urunler.create');
    }

    public function store(Request $request)
    {
        $veri = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
        ]);

        Product::create($veri);

        return redirect('/urunler')->with('basarili', 'Ürün eklendi.');
    }
}