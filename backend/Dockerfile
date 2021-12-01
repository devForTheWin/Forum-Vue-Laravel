FROM php:7.4

RUN apt-get update -y && apt-get install -y openssl zip unzip git sudo
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /app/backend

COPY . .

EXPOSE 8000
CMD composer install --ignore-platform-reqs && php artisan serve --host=0.0.0.0