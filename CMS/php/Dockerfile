FROM php:7.2-fpm-alpine

#Какие команды запустить при установке контейнера
RUN apk update \
    && apk add  --no-cache git mysql-client curl libmcrypt libmcrypt-dev openssh-client icu-dev \
    libxml2-dev freetype-dev libpng-dev libjpeg-turbo-dev g++ make autoconf \
    && docker-php-source extract \
    && docker-php-ext-enable opcache \
    && docker-php-ext-configure pcntl --enable-pcntl \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-source delete \
    && docker-php-ext-install pdo_mysql opcache soap intl zip pcntl gd \
    && rm -rf /tmp/*

CMD ["php-fpm", "-F"]

WORKDIR /var/www

EXPOSE 9000
