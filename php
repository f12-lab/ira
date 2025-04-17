FROM php:8.2-fpm

USER root

RUN apt-get update && apt-get install -y sudo bash

RUN echo "www-data ALL=(ALL) NOPASSWD:ALL" >> /etc/sudoers

COPY ./nginxFiles/website/ /usr/share/nginx/html/

RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql

CMD ["php-fpm"]