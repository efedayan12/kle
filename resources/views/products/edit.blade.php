@extends('layouts.app')

@section('title', 'Ürünü Düzenle')

@section('content')
    <div class="form-card">
        <h1>Ürünü Düzenle</h1>
        <p class="subtitle">Bilgileri değiştirip kaydet.</p>

        <form action="{{ route('products.update', $product) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="field">
                <label for="name">Ürün Adı</label>
                <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" @error('name') class="invalid" @enderror>
                @error('name')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="field">
                <label for="price">Fiyat (TL)</label>
                <input type="text" id="price" name="price" value="{{ old('price', $product->price) }}" inputmode="decimal" @error('price') class="invalid" @enderror>
                @error('price')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="field">
                <label for="description">Açıklama</label>
                <textarea id="description" name="description" rows="5" @error('description') class="invalid" @enderror>{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-actions">
                <a href="{{ route('products.show', $product) }}" class="btn btn-light">Vazgeç</a>
                <button type="submit" class="btn btn-primary">Güncelle</button>
            </div>
        </form>
    </div>
@endsection
