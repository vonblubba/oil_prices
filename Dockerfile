FROM php:8.1.9-fpm-alpine

RUN docker-php-ext-install pdo mysqli sockets
RUN curl -sS https://getcomposer.org/installerâ€‹ | php -- \
     --install-dir=/usr/local/bin --filename=composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .
RUN composer install