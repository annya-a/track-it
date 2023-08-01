FROM php:8.2-fpm-alpine

ENV PHPUSER=root
ENV PHPGROUP=root

RUN sed -i "s/user = www-data/user = ${PHPUSER}/g" /usr/local/etc/php-fpm.d/www.conf
RUN sed -i "s/group = www-data/group = ${PHPGROUP}/g" /usr/local/etc/php-fpm.d/www.conf

RUN mkdir -p /var/www/html

CMD ["php-fpm", "-y", "/usr/local/etc/php-fpm.conf", "-R"]

RUN docker-php-ext-install pdo pdo_mysql bcmath

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer