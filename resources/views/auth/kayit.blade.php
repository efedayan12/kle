@extends('layouts.app')

@section('baslik', 'Kayıt Ol')

@section('icerik')
        <div class="form-kart dar">
        <h1>Kayıt Ol</h1>
        <p class="alt-baslik">Ücretsiz hesabını oluştur.</p>

        <form action="/kayit" method="POST">
            @csrf

            <div class="alan">
                <label for="full_name">İsim Soyisim</label>
                <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}" @error('full_name') class="hatali" @enderror>
                @error('full_name')
                    <span class="alan-hata">{{ $message }}</span>
                @enderror
            </div>

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

            <div class="alan">
                <label for="password_confirmation">Şifre Tekrarı</label>
                <input type="password" id="password_confirmation" name="password_confirmation">
            </div>

            <button type="submit" class="btn btn-primary btn-blok">Kayıt Ol</button>
        </form>

        <p class="form-alt">Hesabın var mı? <a href="/giris">Giriş yap</a></p>
    </div>
@endsection