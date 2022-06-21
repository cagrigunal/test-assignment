FROM php:8.1-fpm

RUN apt-get update && apt-get -y install cron

# Replace shell with bash so we can source files
RUN rm /bin/sh && ln -s /bin/bash /bin/sh

ENV NVM_DIR /usr/local/nvm
ENV NODE_VERSION 16.15.1

WORKDIR $NVM_DIR

RUN curl https://raw.githubusercontent.com/creationix/nvm/master/install.sh | bash \
    && . $NVM_DIR/nvm.sh \
    && nvm install $NODE_VERSION \
    && nvm alias default $NODE_VERSION \
    && nvm use default

ENV NODE_PATH $NVM_DIR/versions/node/v$NODE_VERSION/lib/node_modules
ENV PATH      $NVM_DIR/versions/node/v$NODE_VERSION/bin:$PATH

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
