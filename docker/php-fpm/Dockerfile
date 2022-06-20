FROM php:8.1-fpm

RUN apt-get update && apt-get -y install cron

RUN apt-get install -y \
    git \
    zip \
    curl \
    sudo \
    unzip \
    libxml2-dev \
    libicu-dev \
    libbz2-dev \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libjpeg-dev \
    libmcrypt-dev \
    libreadline-dev \
    libfreetype6-dev \
    g++ 

RUN docker-php-ext-install \
    gd \
    bz2 \
    intl \
    iconv \
    bcmath \
    opcache \
    calendar \
    simplexml \
    zip \
    pdo_mysql


RUN curl --insecure https://getcomposer.org/composer.phar -o /usr/bin/composer && chmod +x /usr/bin/composer

RUN rm /etc/localtime
RUN ln -s /usr/share/zoneinfo/Europe/Bucharest /etc/localtime
RUN "date"

ARG uid
ARG gid

RUN groupadd -g $gid mailergroup
RUN useradd -G www-data,root -u $uid -g $gid -d /home/maileruser maileruser
RUN mkdir -p /home/maileruser/.composer && \
    chown -R maileruser:mailergroup /home/maileruser && \
    su maileruser

RUN chown -R maileruser:mailergroup /home/maileruser
WORKDIR /var/www/mailer
