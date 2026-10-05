@extends('layouts.app')

@section('baslik', 'Kayıt Ol')

@section('icerik')
    <h1>Kayıt Ol</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $hata)
                <li>{{ $hata }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/kayit" method="POST">
        @csrf

        <div>
            <label for="full_name">İsim Soyisim</label>
            <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}">
        </div>

        <div>
            <label for="email">E-posta</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
        </div>

        <div>
            <label for="password">Şifre</label>
            <input type="password" id="password" name="password">
        </div>

        <div>
            <label for="password_confirmation">Şifre Tekrarı</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>

        <button type="submit">Kayıt Ol</button>
    </form>

    <p>Hesabın var mı? <a href="/giris">Giriş yap</a></p>
@endsection