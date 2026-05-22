FROM php:8.4-apache

# =========================
# SYSTEM DEPENDENCIES
# =========================
RUN apt-get update && apt-get install -y \
    git unzip curl zip \
    libpq-dev libzip-dev libonig-dev libxml2-dev libpng-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip mbstring xml \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# =========================
# APACHE CONFIG FIX (CRITICAL)
# =========================
RUN a2enmod rewrite

RUN sed -i 's/Listen 80/Listen 10000/g' /etc/apache2/ports.conf

# Proper Laravel virtual host
RUN printf '\
<VirtualHost *:10000>\n\
    DocumentRoot /var/www/html/public\n\
\n\
    <Directory /var/www/html/public>\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>\n\
\n\
    DirectoryIndex index.php index.html\n\
\n\
    ErrorLog ${APACHE_LOG_DIR}/error.log\n\
    CustomLog ${APACHE_LOG_DIR}/access.log combined\n\
</VirtualHost>\n' > /etc/apache2/sites-available/000-default.conf

# =========================
# NODE + COMPOSER
# =========================
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# =========================
# APP SETUP
# =========================
WORKDIR /var/www/html
COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction
RUN npm install && npm run build

# =========================
# LARAVEL FIXES
# =========================
RUN php artisan storage:link || true

# ❌ DO NOT run migrate or seed here on Render build
# RUN php artisan migrate --force
# RUN php artisan db:seed --force

RUN chmod -R 775 storage bootstrap/cache

EXPOSE 10000

CMD ["apache2-foreground"]