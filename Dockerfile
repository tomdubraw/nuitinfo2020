FROM php:7.4-fpm-alpine
WORKDIR /app
RUN apk add --no-cache composer icu-dev \
 && docker-php-ext-configure intl \
 && docker-php-ext-install pdo_mysql intl
