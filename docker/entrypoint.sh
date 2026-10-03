#!/bin/sh
set -e

php artisan optimize
chown -R www-data:www-data storage bootstrap/cache

exec "$@"
