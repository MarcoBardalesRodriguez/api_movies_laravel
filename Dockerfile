FROM php:8.2
RUN apk add --no-cache zip
RUN apk add --no-cache curl
RUN apk add --no-cache git

RUN curl -sS https://getcomposer.org/installer | \
    php -- --install-dir=/usr/local/bin --filename=composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /app
COPY . /app

RUN composer install --ignore-platform-reqs --no-interaction --no-plugins --no-scripts --prefer-dist --no-dev --no-suggest --no-progress --no-autoloader

COPY .env.example .env

RUN mkdir -p /app/storage/logs

RUN php artisan cache:clear
RUN php artisan view:clear
RUN php artisan config:clear

RUN php artisan key:generate
RUN php artisan migrate
RUN php artisan serve --host=0.0.0.0 --port=8000

EXPOSE 8000
