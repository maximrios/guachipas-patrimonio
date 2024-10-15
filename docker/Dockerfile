# Partimos de la imagen php en su versión 7.4
FROM php:8.1-apache

RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    git \
    curl \
    libpq-dev \
    libzip-dev \
    libpng-dev

RUN a2enmod rewrite

RUN docker-php-ext-install pdo_mysql zip exif pcntl; \
    docker-php-ext-configure gd --with-freetype --with-jpeg; \
    docker-php-ext-install gd

WORKDIR /var/www/patrimonio

RUN curl -sS https://getcomposer.org/installer | php -- -- install-dir=/usr/local/bin --filename=composer

RUN apt-get update
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash -
RUN apt-get update && apt-get install -y nodejs

EXPOSE 80
