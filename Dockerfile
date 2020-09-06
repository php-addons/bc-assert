FROM php:7.4.4-cli

RUN mkdir /bc-assert
WORKDIR /bc-assert

RUN docker-php-ext-install bcmath
RUN apt-get update
RUN apt-get install -y git zip unzip
RUN pecl install xdebug-2.9.0 && \
    docker-php-ext-enable xdebug

RUN curl --silent --show-error https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

RUN chmod +x /usr/local/bin/composer && \
    /usr/local/bin/composer global require 'vimeo/psalm'
