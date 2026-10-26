@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <a href="{{ route('products.index') }}" class="back-link">← Ürün listesi</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="detail-card">
        <div class="detail-header">
            <div>
                <h1>{{ $product->name }}</h1>
                <p class="detail-date">
                    Eklenme: {{ $product->created_at->format('d.m.Y H:i') }}
                    @if ($product->updated_at->gt($product->created_at))
                        · Son güncelleme: {{ $product->updated_at->format('d.m.Y H:i') }}
                    @endif
                </p>
            </div>
            <span class="detail-price">{{ number_format($product->price, 2, ',', '.') }} TL</span>
        </div>

        <p class="detail-description">{{ $product->description }}</p>

        <div class="detail-actions">
            <a href="{{ route('products.edit', $product) }}" class="btn btn-light">Düzenle</a>
            <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Bu ürün silinecek. Emin misiniz?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Sil</button>
            </form>
        </div>
    </div>
@endsection
