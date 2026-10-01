@extends('layouts.app')

@section('baslik', 'Yeni Ürün')

@section('icerik')
    <h1>Yeni Ürün</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $hata)
                <li>{{ $hata }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/urunler" method="POST">
        @csrf

        <div>
            <label for="name">Ürün Adı</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
        </div>

        <div>
            <label for="price">Fiyat</label>
            <input type="text" id="price" name="price" value="{{ old('price') }}">
        </div>

        <div>
            <label for="description">Açıklama</label>
            <textarea id="description" name="description">{{ old('description') }}</textarea>
        </div>

        <button type="submit">Kaydet</button>
    </form>
@endsection