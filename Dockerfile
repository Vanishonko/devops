FROM php:apache

RUN apt-get update && apt-get install -y \
    tar \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libpq-dev \
    npm \
    zip \
    libzip-dev \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mysqli pdo pdo_mysql pdo_pgsql zip

# Fix index.php being looked for in the wrong place
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Enable .htaccess files
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy existing application directory contents
COPY . /var/www/html/

# Install Composer dependencies
RUN composer install --no-interaction --no-dev --optimize-autoloader

# Change ownership of storage and bootstrap/cache directories to fix permissions issues
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache


# Laravel config
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr

# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

# Run the script for deployment
COPY scripts/deploy.sh /deploy.sh
RUN chmod +x /deploy.sh
CMD ["/deploy.sh"]
