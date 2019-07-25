#!/bin/bash

cp /var/www/html/.env.example /var/www/html/.env && composer install && php artisan key:generate && php artisan migrate --seed && php artisan passport:install
