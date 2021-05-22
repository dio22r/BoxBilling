FROM php:7.4.19-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql gettext
RUN a2enmod rewrite

COPY . /var/www/html/