FROM php:apache
#define base image

RUN apt-get update && apt-get install -y \
    tar \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    npm \
    zip \
    libzip-dev \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mysqli pdo pdo_mysql zip
# install dependencies

# Fix index.php being looked for in the wrong place
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
# this also replaces any occurence of /var/www/ in the apache config files with the new document root

# Enable .htaccess files
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Restart Apache to apply changes (kind of useless since it restarts when the container starts)
# RUN service apache2 restart

# install Composer
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# copy existing application directory contents
COPY . /var/www/html/

# change ownership of storage and bootstrap/cache directories to fix permissions issues
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

