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

        return redirect('/')->with('basarili', 'Ürün eklendi.');
    }
public function show(Product $urun)
    {
        return view('urunler.show', ['urun' => $urun]);
    }

    public function edit(Product $urun)
    {
        return view('urunler.edit', ['urun' => $urun]);
    }

    public function update(Request $request, Product $urun)
    {
        $veri = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
        ]);

        $urun->update($veri);

        return redirect('/urunler/' . $urun->id)->with('basarili', 'Ürün güncellendi.');
    }

    public function destroy(Product $urun)
    {
        $urun->delete();

        return redirect('/')->with('basarili', 'Ürün silindi.');
    }
}