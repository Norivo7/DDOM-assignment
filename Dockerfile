FROM php:8.3-cli

WORKDIR /app

COPY . /app

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install zip

RUN composer install

CMD ["php", "example.php"]