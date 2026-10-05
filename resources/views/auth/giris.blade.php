@extends('layouts.app')

@section('baslik', 'Giriş Yap')

@section('icerik')
    <h1>Giriş Yap</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $hata)
                <li>{{ $hata }}</li>
            @endforeach
        </ul>
    @endif

    @if (session('uyari'))
        <p>{{ session('uyari') }}</p>
    @endif

    <form action="/giris" method="POST">
        @csrf

        <div>
            <label for="email">E-posta</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
        </div>

        <div>
            <label for="password">Şifre</label>
            <input type="password" id="password" name="password">
        </div>

        <button type="submit">Giriş Yap</button>
    </form>

    <p>Hesabın yok mu? <a href="/kayit">Kayıt ol</a></p>
@endsection