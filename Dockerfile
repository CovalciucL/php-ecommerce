FROM php:7.4-apache AS dev-stage

WORKDIR /var/www/html/

RUN apt update -y
RUN apt install zip unzip git -y
RUN docker-php-ext-install pdo pdo_mysql
RUN a2enmod rewrite
RUN service apache2 restart

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash
RUN apt -y install nodejs

# COPY ./composer.json .
# COPY ./package.json .
# RUN npm install
# RUN composer install
# COPY ./ .
# RUN npm run dev


FROM php:7.4-apache AS build-stage

WORKDIR /var/www/html/

COPY --from=dev-stage /var/www/html/ .

RUN npm run prod
