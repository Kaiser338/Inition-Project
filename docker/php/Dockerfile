FROM php:7.4.3-fpm-alpine3.11

RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

COPY . /app

VOLUME ["/app"]