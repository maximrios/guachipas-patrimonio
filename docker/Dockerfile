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

RUN sed -i 's/listen = 127.0.0.1:9000/listen = 9000/g' /usr/local/etc/php-fpm.d/www.conf
# Establecer directorio de trabajo
WORKDIR /var/www/patrimonio

# Instalar dependencias de Laravel

#RUN composer install --no-scripts --no-autoloader

# Copiar el resto del código
COPY . ./

# Dar permisos
#RUN chown -R www-data:www-data /var/www/patrimonio/storage /var/www/patrimonio/bootstrap/cache

# Ejecutar supervisord si esta app lo necesita
CMD ["php-fpm"]