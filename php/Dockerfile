ARG PHP_VERSION="5.6"
FROM php:${PHP_VERSION:+${PHP_VERSION}-}fpm-alpine

RUN apk update; \
    apk upgrade;

RUN docker-php-ext-install mysqli

VOLUME /var/www/html
COPY index.php /var/www/html