FROM php:8.3-fpm

RUN pecl install redis 
RUN apt-get update \
    && apt-get install -y \
    unzip \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
    nodejs \
    npm \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mbstring zip pdo pdo_mysql pcntl\
    && docker-php-ext-enable redis\
    && apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

#RUN composer create-project --prefer-dist laravel/laravel app

#RUN chown -R www-data:www-data /var/www/app

#WORKDIR /var/www/app

CMD ["php-fpm"]
