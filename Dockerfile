FROM php:7.4-apache

WORKDIR /var/www/html/

COPY ./composer.json .
COPY ./package.json .
RUN apt update
RUN apt install zip unzip git
RUN docker-php-ext-install pdo pdo_mysql
RUN a2enmod rewrite
RUN service apache2 restart
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN curl -sL https://deb.nodesource.com/setup_6.x | bash
RUN apt -y install nodejs
# RUN npm install -g gulp-cli@3.9.1
# RUN npm install -g bower@1.8.0



