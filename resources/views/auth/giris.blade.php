@extends('layouts.app')

@section('baslik', 'Giriş Yap')

@section('icerik')
        <div class="form-kart dar">
        <h1>Giriş Yap</h1>
        <p class="alt-baslik">Ürünlerini yönetmek için hesabına giriş yap.</p>

        @if (session('uyari'))
            <div class="bildirim bildirim-uyari">{{ session('uyari') }}</div>
        @endif

        <form action="/giris" method="POST">
            @csrf

            <div class="alan">
                <label for="email">E-posta</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" @error('email') class="hatali" @enderror>
                @error('email')
                    <span class="alan-hata">{{ $message }}</span>
                @enderror
            </div>

            <div class="alan">
                <label for="password">Şifre</label>
                <input type="password" id="password" name="password" @error('password') class="hatali" @enderror>
                @error('password')
                    <span class="alan-hata">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary btn-blok">Giriş Yap</button>
        </form>

        <p class="form-alt">Hesabın yok mu? <a href="/kayit">Kayıt ol</a></p>
    </div>
@endsection