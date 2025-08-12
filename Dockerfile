FROM php:8.2-fpm

# Dependencias del sistema
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    supervisor \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql bcmath

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Establecer directorio de trabajo
WORKDIR /var/www

# Instalar dependencias de Laravel
COPY ./composer.json ./composer.lock ./
RUN composer install --no-scripts --no-autoloader

# Copiar el resto del código
COPY . ./

# Dar permisos
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Ejecutar supervisord si esta app lo necesita
CMD ["php-fpm"]