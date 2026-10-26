<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'kle')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="site-header">
        <nav class="nav container">
            <a href="{{ route('products.index') }}" class="logo">kle</a>

            <div class="nav-links">
                <a href="{{ route('products.index') }}" class="{{ request()->routeIs('products.index') ? 'active' : '' }}">Ürünler</a>
                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">Hakkında</a>
            </div>

            <div class="nav-user">
                @auth
                    <span class="user-name">{{ auth()->user()->full_name }}</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-light">Çıkış</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-light">Giriş</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Kayıt Ol</a>
                @endauth
            </div>
        </nav>
    </header>

    <main class="container page">
        @yield('content')
    </main>
</body>
</html>
