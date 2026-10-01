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
        <a href="/urunler">Ürünler</a>
    </nav>

    <main>
        @yield('icerik')
    </main>
</body>
</html>