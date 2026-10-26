@extends('layouts.app')

@section('title', 'Kayıt Ol')

@section('content')
    <div class="form-card narrow">
        <h1>Kayıt Ol</h1>
        <p class="subtitle">Ücretsiz hesabını oluştur.</p>

        <form action="{{ route('register.store') }}" method="POST">
            @csrf

            <div class="field">
                <label for="full_name">İsim Soyisim</label>
                <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}" @error('full_name') class="invalid" @enderror>
                @error('full_name')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="field">
                <label for="email">E-posta</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" @error('email') class="invalid" @enderror>
                @error('email')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="field">
                <label for="password">Şifre</label>
                <input type="password" id="password" name="password" @error('password') class="invalid" @enderror>
                @error('password')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="field">
                <label for="password_confirmation">Şifre Tekrarı</label>
                <input type="password" id="password_confirmation" name="password_confirmation">
            </div>

            <button type="submit" class="btn btn-primary btn-block">Kayıt Ol</button>
        </form>

        <p class="form-footer">Hesabın var mı? <a href="{{ route('login') }}">Giriş yap</a></p>
    </div>
@endsection
