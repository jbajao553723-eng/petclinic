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
# APACHE SETUP (CRITICAL)
# =========================
RUN a2enmod rewrite

RUN sed -i 's/Listen 80/Listen 10000/g' /etc/apache2/ports.conf

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
# 🔥 CRITICAL FIXES (YOUR ERROR)
# =========================

# Create required writable folders
RUN mkdir -p \
    storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views \
    bootstrap/cache

# Fix permissions (VERY IMPORTANT)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage bootstrap/cache

# Fix Laravel temp directory issue (tempnam crash fix)
ENV TMPDIR=/var/www/html/storage/framework/cache

# Laravel safe commands (NO DB OPERATIONS HERE)
RUN php artisan storage:link || true

# =========================
# FINAL
# =========================
EXPOSE 10000

CMD ["apache2-foreground"]