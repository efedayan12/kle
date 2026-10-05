@extends('layouts.app')

@section('baslik', 'Ürünü Düzenle')

@section('icerik')
    <h1>Ürünü Düzenle</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $hata)
                <li>{{ $hata }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/urunler/{{ $urun->id }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Ürün Adı</label>
            <input type="text" id="name" name="name" value="{{ old('name', $urun->name) }}">
        </div>

        <div>
            <label for="price">Fiyat</label>
            <input type="text" id="price" name="price" value="{{ old('price', $urun->price) }}">
        </div>

        <div>
            <label for="description">Açıklama</label>
            <textarea id="description" name="description">{{ old('description', $urun->description) }}</textarea>
        </div>

        <button type="submit">Güncelle</button>
    </form>

    <p><a href="/urunler/{{ $urun->id }}">Vazgeç</a></p>
@endsection