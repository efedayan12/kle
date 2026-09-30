#!/bin/sh
set -e

cd /var/www

if [ ! -f .env ]; then
    echo "==> .env bulunamadi, .env.example kopyalaniyor"
    cp .env.example .env
fi

if [ ! -d vendor ]; then
    echo "==> composer bagimliliklari kuruluyor"
    composer install --no-interaction --prefer-dist --optimize-autoloader
fi

if ! grep -q "^APP_KEY=base64:" .env; then
    echo "==> uygulama anahtari uretiliyor"
    php artisan key:generate --force
fi

echo "==> veritabani tablolari olusturuluyor"
php artisan migrate --force

chmod -R ug+rw storage bootstrap/cache

exec "$@"