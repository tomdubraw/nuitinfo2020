FROM php:7.4-fpm-alpine
WORKDIR /app
RUN docker-php-ext-install pdo_mysql && apk add --no-cache composer
