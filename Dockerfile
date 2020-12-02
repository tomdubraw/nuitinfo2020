FROM php:7.4-fpm-alpine as php
WORKDIR /app
RUN apk add --no-cache composer icu-dev \
 && docker-php-ext-configure intl \
 && docker-php-ext-install pdo_mysql intl

FROM node:14-alpine as yarn

COPY ./app/package.json ./app/yarn.lock /app/

WORKDIR /app
RUN yarn install

ENTRYPOINT [ "yarn" ]
CMD [ "dev" ]