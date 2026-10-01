@extends('layouts.app')

@section('baslik', 'Ürünler')

@section('icerik')
    <h1>Ürünler</h1>

    @foreach ($urunler as $urun)
        <div>
            <h3>{{ $urun['ad'] }}</h3>
            <p>{{ $urun['fiyat'] }} TL</p>

            @if ($urun['stok'] > 10)
                <p>Bol stok var</p>
            @elseif ($urun['stok'] > 0)
                <p>Son {{ $urun['stok'] }} ürün</p>
            @else
                <p>Tükendi</p>
            @endif
        </div>
    @endforeach
@endsection