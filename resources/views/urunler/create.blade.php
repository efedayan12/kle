@extends('layouts.app')

@section('baslik', 'Yeni Ürün')

@section('icerik')
    <div class="form-kart">
        <h1>Yeni Ürün</h1>
        <p class="alt-baslik">Eklemek istediğin ürünün bilgilerini gir.</p>

        <form action="/urunler" method="POST">
            @csrf

            <div class="alan">
                <label for="name">Ürün Adı</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" @error('name') class="hatali" @enderror>
                @error('name')
                    <span class="alan-hata">{{ $message }}</span>
                @enderror
            </div>

            <div class="alan">
                <label for="price">Fiyat (TL)</label>
                <input type="text" id="price" name="price" value="{{ old('price') }}" inputmode="decimal" placeholder="Örn: 149.90" @error('price') class="hatali" @enderror>
                @error('price')
                    <span class="alan-hata">{{ $message }}</span>
                @enderror
            </div>

            <div class="alan">
                <label for="description">Açıklama</label>
                <textarea id="description" name="description" rows="5" @error('description') class="hatali" @enderror>{{ old('description') }}</textarea>
                @error('description')
                    <span class="alan-hata">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-eylem">
                <a href="/" class="btn btn-light">Vazgeç</a>
                <button type="submit" class="btn btn-primary">Kaydet</button>
            </div>
        </form>
    </div>
@endsection