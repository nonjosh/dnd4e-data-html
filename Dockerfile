FROM php:apache-bullseye

COPY . /var/www/html

RUN a2enmod headers

EXPOSE 80

HEALTHCHECK --interval=300s --timeout=3s --retries=3 CMD curl -f / http://localhost:80 || exit 1
