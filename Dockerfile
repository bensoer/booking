FROM php:7-alpine

RUN docker-php-ext-install pdo pdo_mysql
# for mysqli if you want
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli