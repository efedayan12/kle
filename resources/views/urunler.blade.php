@extends('layouts.app')

@section('baslik', 'Ürünler')

@section('icerik')
    <h1>Ürünler</h1>

    @forelse ($urunler as $urun)
        <div>
            <h3>{{ $urun->name }}</h3>
            <p>{{ $urun->price }} TL</p>
            <p>{{ $urun->description }}</p>
        </div>
    @empty
        <p>Henüz ürün eklenmemiş.</p>
    @endforelse
@endsection