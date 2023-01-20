FROM php:7.2-cli

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libzip-dev \
    && pecl install zip \
    && docker-php-ext-enable zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


WORKDIR /app

COPY . .

RUN composer install --prefer-dist --no-progress --no-scripts --no-interaction;

