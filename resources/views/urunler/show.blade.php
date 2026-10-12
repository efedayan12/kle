@extends('layouts.app')

@section('baslik', $urun->name)

@section('icerik')
    @if (session('basarili'))
        <p>{{ session('basarili') }}</p>
    @endif

    <p><a href="/">← Ürün listesi</a></p>

    <h1>{{ $urun->name }}</h1>
    <p>{{ $urun->price }} TL</p>
    <p>{{ $urun->description }}</p>

    <p>Eklenme tarihi: {{ $urun->created_at->format('d.m.Y H:i') }}</p>

    <a href="/urunler/{{ $urun->id }}/duzenle">Düzenle</a>

    <form action="/urunler/{{ $urun->id }}" method="POST"
          onsubmit="return confirm('Bu ürün silinecek. Emin misiniz?')">
        @csrf
        @method('DELETE')
        <button type="submit">Sil</button>
    </form>
@endsection