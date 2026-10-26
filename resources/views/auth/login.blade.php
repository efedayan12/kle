@extends('layouts.app')

@section('title', 'Giriş Yap')

@section('content')
    <div class="form-card narrow">
        <h1>Giriş Yap</h1>
        <p class="subtitle">Ürünlerini yönetmek için hesabına giriş yap.</p>

        @if (session('warning'))
            <div class="alert alert-warning">{{ session('warning') }}</div>
        @endif

        <form action="{{ route('login.store') }}" method="POST">
            @csrf

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

            <button type="submit" class="btn btn-primary btn-block">Giriş Yap</button>
        </form>

        <p class="form-footer">Hesabın yok mu? <a href="{{ route('register') }}">Kayıt ol</a></p>
    </div>
@endsection
