FROM php:8.4-fpm-alpine

RUN docker-php-ext-install pdo pdo_mysql
RUN curl -sS https://getcomposer.org/installer | php -- \
        --install-dir=/usr/local/bin --filename=composer

COPY --link \
    --from=ghcr.io/symfony-cli/symfony-cli:latest \
    /usr/local/bin/symfony /usr/local/bin/symfony

RUN apk update;
RUN apk add git;

WORKDIR /app
COPY . .
RUN composer install --prefer-dist --no-dev --no-scripts --optimize-autoloader

#RUN chmod 775 -R ../app
#RUN addgroup -S nginx && adduser -S nginx -G nginx
RUN chown -R www-data:www-data config src
#RUN chmod -R 0777  var/cache
RUN chmod -R 0775  config src templates
#CMD symfony server:start
