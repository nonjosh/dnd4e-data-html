FROM php:7.3.33-apache

COPY . /var/www/html

RUN a2enmod headers

EXPOSE 80

HEALTHCHECK --interval=300s --timeout=3s --retries=3 CMD curl -f / http://localhost:80 || exit 1 