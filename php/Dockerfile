FROM php:8.0-fpm

RUN apt-get update && apt-get install -y

RUN apt-get install -y git

RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql


RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

CMD ["php-fpm"]

EXPOSE 9000