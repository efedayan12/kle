@extends('layouts.app')

@section('title', 'Yeni Ürün')

@section('content')
    <div class="form-card">
        <h1>Yeni Ürün</h1>
        <p class="subtitle">Eklemek istediğin ürünün bilgilerini gir.</p>

        <form action="{{ route('products.store') }}" method="POST">
            @csrf

            <div class="field">
                <label for="name">Ürün Adı</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" @error('name') class="invalid" @enderror>
                @error('name')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="field">
                <label for="price">Fiyat (TL)</label>
                <input type="text" id="price" name="price" value="{{ old('price') }}" inputmode="decimal" placeholder="Örn: 149.90" @error('price') class="invalid" @enderror>
                @error('price')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="field">
                <label for="description">Açıklama</label>
                <textarea id="description" name="description" rows="5" @error('description') class="invalid" @enderror>{{ old('description') }}</textarea>
                @error('description')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-actions">
                <a href="{{ route('products.index') }}" class="btn btn-light">Vazgeç</a>
                <button type="submit" class="btn btn-primary">Kaydet</button>
            </div>
        </form>
    </div>
@endsection
