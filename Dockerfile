FROM php:7.4-apache AS base
WORKDIR /var/www/html/

RUN apt update -y
RUN apt install zip unzip git -y
RUN docker-php-ext-install pdo pdo_mysql
RUN a2enmod rewrite
RUN service apache2 restart
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

FROM base AS dev-stage
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
RUN curl -sLf -o /dev/null 'https://deb.nodesource.com/node_8.x/dists/bullseye/Release' | bash
RUN apt -y install nodejs
RUN npm run watch

FROM composer:2.0.8 AS vendors

COPY ./composer.json .
RUN composer install

FROM node:8 AS public
WORKDIR /app
COPY ./package.json .
COPY ./webpack.mix.js .
COPY ./resources ./resources
RUN npm install
RUN npm run prod

FROM base AS build-stage
COPY ./ /var/www/html/
COPY --from=vendors /app/vendor/ /var/www/html/vendor/
COPY --from=public /app/public/js/ /var/www/html/public/js/
COPY --from=public /app/public/css/ /var/www/html/public/css/


