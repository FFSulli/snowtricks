FROM php:8.0-fpm

RUN pecl install apcu

RUN apt-get update && \
    apt-get install -y \
    libpq-dev \
    libzip-dev \
    acl \
    zip \
    ca-certificates

RUN apt-get -y update \
&& apt-get install -y zlib1g-dev libicu-dev g++ \
&& docker-php-ext-configure intl \
&& docker-php-ext-install intl

RUN docker-php-ext-install \
    opcache \
    pdo \
    pdo_mysql \
    pdo_pgsql \
    pcntl \
    bcmath

RUN docker-php-ext-enable apcu pdo

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ENV PATH="${PATH}:/root/.composer/vendor/bin"
ENV PATH="${PATH}:/var/www/bin"

WORKDIR /var/www

RUN PATH=$PATH:/var/www/vendor/bin:bin

RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

COPY docker/php/docker-entrypoint.sh /docker-entrypoint
RUN chmod 755 /docker-entrypoint

ENTRYPOINT ["/docker-entrypoint"]

CMD ["php-fpm"]
