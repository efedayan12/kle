# kle

Ürün yönetimi için geliştirilen Laravel uygulaması. Laravel 13, PHP 8.4 ve MySQL 8 kullanır, tamamen Docker üzerinde çalışır.

## Gereksinimler

- Docker Desktop (Windows'ta WSL2 ile birlikte)

Bilgisayarınıza PHP, Composer veya MySQL kurmanıza gerek yoktur; hepsi konteynerlerin içinde gelir.

## Kurulum

```bash
git clone https://github.com/efedayan12/kle.git
cd kle
docker compose up -d --build
```

Hepsi bu. İlk açılışta uygulama şunları kendisi yapar:

- `.env` dosyasını `.env.example` şablonundan oluşturur
- `composer install` ile bağımlılıkları kurar
- Uygulama anahtarını (`APP_KEY`) üretir
- Veritabanı tablolarını migration ile oluşturur

Kurulum tamamlandığında uygulama şu adreste çalışır: **http://localhost**

Kurulum sürecini izlemek isterseniz:

```bash
docker compose logs -f app
```

## Servisler

| Servis | Görevi | Port |
| --- | --- | --- |
| `web` | nginx, gelen istekleri karşılar | 80 |
| `app` | php-fpm, uygulamayı çalıştırır | - |
| `db` | MySQL 8 veritabanı | - |

## Sık kullanılan komutlar

```bash
docker compose up -d                            # başlat
docker compose down                             # durdur
docker compose logs -f app                      # logları izle
docker compose exec app php artisan migrate     # migration çalıştır
docker compose exec app composer install        # bağımlılıkları kur
```
## Özellikler

- Kayıt olma, giriş yapma ve çıkış
- Giriş yapmamış kullanıcı ürünleri göremez; giriş sayfasına yönlendirilir
- Ürün ekleme, listeleme, detay görüntüleme, düzenleme ve silme (CRUD)
- Türkçe form doğrulama mesajları
- Telefon, tablet ve bilgisayarda uyumlu (responsive) arayüz

## Kullanım

1. http://localhost adresinden **Kayıt Ol** sayfasına gidip hesap oluşturun.
2. Kayıttan sonra ürün listesine yönlendirilirsiniz.
3. **+ Yeni ürün** ile ürün ekleyin; ürüne tıklayarak detayını görün, düzenleyin veya silin.

İsterseniz örnek bir kullanıcı oluşturabilirsiniz (e-posta `test@example.com`, şifre `password`):

```bash
docker compose exec app php artisan db:seed
```

## Testler

```bash
docker compose exec app php artisan test
```

## Sorun giderme

**80 numaralı port kullanımda hatası:** Bilgisayarınızda 80 portunu kullanan başka bir program varsa `compose.yaml` içinde `"80:80"` satırını `"8080:80"` yapın ve uygulamayı http://localhost:8080 adresinden açın.

**Veritabanını sıfırlamak için:**

```bash
docker compose down -v
docker compose up -d
```