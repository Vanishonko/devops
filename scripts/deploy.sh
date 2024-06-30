echo "Running composer"
composer global require hirak/prestissimo
composer install --no-dev --working-dir=/var/www/html

echo "Caching config..."
php /var/www/html/artisan config:cache

echo "Caching routes..."
php /var/www/html/artisan route:cache

echo "Running migrations..."
php artisan migrate --force
