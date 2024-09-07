FROM php:8.3-cli

WORKDIR /app

COPY . /app

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer install

CMD ["php", "example.php"]