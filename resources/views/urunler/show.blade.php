@extends('layouts.app')

@section('baslik', $urun->name)

@section('icerik')
    <a href="/" class="geri-link">← Ürün listesi</a>

    @if (session('basarili'))
        <div class="bildirim bildirim-basarili">{{ session('basarili') }}</div>
    @endif

    <div class="detay-kart">
        <div class="detay-ust">
            <div>
                <h1>{{ $urun->name }}</h1>
                <p class="detay-tarih">
                    Eklenme: {{ $urun->created_at->format('d.m.Y H:i') }}
                    @if ($urun->updated_at->gt($urun->created_at))
                        · Son güncelleme: {{ $urun->updated_at->format('d.m.Y H:i') }}
                    @endif
                </p>
            </div>
            <span class="detay-fiyat">{{ number_format($urun->price, 2, ',', '.') }} TL</span>
        </div>

        <p class="detay-aciklama">{{ $urun->description }}</p>

        <div class="detay-eylem">
            <a href="/urunler/{{ $urun->id }}/duzenle" class="btn btn-light">Düzenle</a>
            <form action="/urunler/{{ $urun->id }}" method="POST" onsubmit="return confirm('Bu ürün silinecek. Emin misiniz?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-tehlike">Sil</button>
            </form>
        </div>
    </div>
@endsection