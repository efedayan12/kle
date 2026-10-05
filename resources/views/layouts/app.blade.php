<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('baslik', 'kle')</title>
</head>
<body>
        <nav>
        <a href="/">Anasayfa</a>
        <a href="/hakkinda">Hakkında</a>

        @auth
            <span>{{ auth()->user()->full_name }}</span>
            <form action="/cikis" method="POST" style="display:inline">
                @csrf
                <button type="submit">Çıkış</button>
            </form>
        @else
            <a href="/giris">Giriş</a>
            <a href="/kayit">Kayıt Ol</a>
        @endauth
    </nav>
    <main>
        @yield('icerik')
    </main>
</body>
</html>