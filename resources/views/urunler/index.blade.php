@extends('layouts.app')

@section('baslik', 'Ürünler')

@section('icerik')
    <div class="sayfa-baslik">
        <div>
            <h1>Ürünler</h1>
            <p class="alt-baslik">{{ $urunler->count() }} ürün listeleniyor</p>
        </div>
        <a href="/urunler/ekle" class="btn btn-primary">+ Yeni ürün</a>
    </div>

    @if (session('basarili'))
        <div class="bildirim bildirim-basarili">{{ session('basarili') }}</div>
    @endif

    <div class="urun-listesi">
        @forelse ($urunler as $urun)
            <a href="/urunler/{{ $urun->id }}" class="urun-karti">
                <h3>{{ $urun->name }}</h3>
                <p class="urun-aciklama">{{ Str::limit($urun->description, 90) }}</p>
                <span class="urun-fiyat">{{ number_format($urun->price, 2, ',', '.') }} TL</span>
            </a>
        @empty
            <div class="bos-durum">
                <p>Henüz ürün eklenmemiş.</p>
                <a href="/urunler/ekle" class="btn btn-primary">İlk ürünü ekle</a>
            </div>
        @endforelse
    </div>
@endsection