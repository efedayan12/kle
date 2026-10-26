@extends('layouts.app')

@section('title', 'Ürünler')

@section('content')
    <div class="page-header">
        <div>
            <h1>Ürünler</h1>
            <p class="subtitle">{{ $products->count() }} ürün listeleniyor</p>
        </div>
        <a href="{{ route('products.create') }}" class="btn btn-primary">+ Yeni ürün</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="product-list">
        @forelse ($products as $product)
            <a href="{{ route('products.show', $product) }}" class="product-card">
                <h3>{{ $product->name }}</h3>
                <p class="product-description">{{ Str::limit($product->description, 90) }}</p>
                <span class="product-price">{{ number_format($product->price, 2, ',', '.') }} TL</span>
            </a>
        @empty
            <div class="empty-state">
                <p>Henüz ürün eklenmemiş.</p>
                <a href="{{ route('products.create') }}" class="btn btn-primary">İlk ürünü ekle</a>
            </div>
        @endforelse
    </div>
@endsection
