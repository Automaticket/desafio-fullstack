FROM php:7.2.20-fpm-alpine

WORKDIR /app

RUN apk update && apk add bash

RUN docker-php-ext-install pcntl
RUN docker-php-ext-install pdo_mysql
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install
COPY ./.env .
RUN php artisan migrate:refresh
RUN php artisan db:seed --class=UserTableSeeder