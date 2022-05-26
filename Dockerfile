FROM php:8.1-fpm
RUN apt-get update -y && apt-get install -y openssl zip unzip git libpq-dev
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo_mysql bcmath
RUN pecl install -o -f redis \
&&  rm -rf /tmp/pear \
&&  docker-php-ext-enable redis

ADD . /project

WORKDIR /project
RUN cd laravel \
    && composer install \
    && pwd
CMD cd /project/laravel && php artisan serve --host=0.0.0.0 --port=8181
EXPOSE 8181
