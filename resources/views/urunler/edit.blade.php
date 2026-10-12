@extends('layouts.app')

@section('baslik', 'Ürünü Düzenle')

@section('icerik')
        <div class="form-kart">
        <h1>Ürünü Düzenle</h1>
        <p class="alt-baslik">Bilgileri değiştirip kaydet.</p>

        <form action="/urunler/{{ $urun->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="alan">
                <label for="name">Ürün Adı</label>
                <input type="text" id="name" name="name" value="{{ old('name', $urun->name) }}" @error('name') class="hatali" @enderror>
                @error('name')
                    <span class="alan-hata">{{ $message }}</span>
                @enderror
            </div>

            <div class="alan">
                <label for="price">Fiyat (TL)</label>
                <input type="text" id="price" name="price" value="{{ old('price', $urun->price) }}" inputmode="decimal" @error('price') class="hatali" @enderror>
                @error('price')
                    <span class="alan-hata">{{ $message }}</span>
                @enderror
            </div>

            <div class="alan">
                <label for="description">Açıklama</label>
                <textarea id="description" name="description" rows="5" @error('description') class="hatali" @enderror>{{ old('description', $urun->description) }}</textarea>
                @error('description')
                    <span class="alan-hata">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-eylem">
                <a href="/urunler/{{ $urun->id }}" class="btn btn-light">Vazgeç</a>
                <button type="submit" class="btn btn-primary">Güncelle</button>
            </div>
        </form>
    </div>
@endsection