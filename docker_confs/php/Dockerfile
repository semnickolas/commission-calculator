FROM php:8.3-fpm

# libs
RUN apt-get update && apt-get install -y git unzip zlib1g-dev libzip-dev libxml2-dev nano htop

# composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# extensions
RUN docker-php-ext-install zip bcmath opcache && docker-php-ext-enable opcache


RUN echo 'memory_limit = 2G' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini;

# workdir
WORKDIR /code

# entrypoint
COPY entrypoint.sh /
RUN chmod +x /entrypoint.sh
ENTRYPOINT /entrypoint.sh
