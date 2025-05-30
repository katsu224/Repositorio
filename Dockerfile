# Imagen base con PHP y extensiones necesarias
FROM php:8.2-fpm

# Instalar dependencias
RUN apt-get update && apt-get install -y \
    zip unzip curl git libzip-dev \
    libpng-dev libjpeg-dev libfreetype6-dev \
    libonig-dev libxml2-dev libpq-dev \
    npm nodejs \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_pgsql mbstring exif pcntl bcmath gd

# Instalar Composer desde contenedor oficial
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# Directorio de trabajo
WORKDIR /var/www

# Copiar archivos del proyecto
COPY . .

# Instalar dependencias de PHP y JS
RUN composer install --no-dev --optimize-autoloader
RUN npm install && npm run build

# Permisos necesarios
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage /var/www/bootstrap/cache

# Puerto para Laravel
EXPOSE 8000

# Comando para iniciar Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
