FROM php:8.2.10

RUN apt-get update -y && apt-get install -y openssl zip unzip git

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app
COPY . /app

RUN composer install

RUN mkdir -p /app/storage
RUN touch /app/storage/database.sqlite
RUN chmod 664 /app/storage/database.sqlite
RUN cp .env.example .env

RUN php artisan migrate
RUN php artisan db:seed

CMD php -S 0.0.0.0:8181 -t public/
EXPOSE 8181