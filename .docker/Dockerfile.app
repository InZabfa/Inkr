# -----------------------------------------------
# Stage 1: Build from official PHP 8.2 FPM image
# -----------------------------------------------
    FROM php:8.2-fpm

    # Avoid interactive prompts during package installation
    ENV DEBIAN_FRONTEND=noninteractive
    
    # -----------------------------------------------
    # Install system dependencies and PHP extensions
    # -----------------------------------------------
    RUN apt-get update && apt-get install -y \
        git \
        curl \
        zip \
        unzip \
        libzip-dev \
        libonig-dev \
        libpng-dev \
        libjpeg62-turbo-dev \
        libfreetype6-dev \
        libxml2-dev \
        && docker-php-ext-configure gd \
           --with-freetype \
           --with-jpeg \
        && docker-php-ext-install \
           gd \
           pdo_mysql \
           bcmath \
           zip
    
    # -----------------------------------------------
    # Install Composer
    # -----------------------------------------------
    RUN curl -sS https://getcomposer.org/installer -o composer-setup.php \
        && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
        && rm composer-setup.php
    
    # -----------------------------------------------
    # Set up the working directory
    # -----------------------------------------------
    WORKDIR /var/www/html
    
    # -----------------------------------------------
    # Copy your Laravel project into the container
    # -----------------------------------------------
    COPY ./backend .
    
    # -----------------------------------------------
    # Install PHP dependencies with Composer
    # -----------------------------------------------
    RUN composer install --no-dev --optimize-autoloader
    
    # -----------------------------------------------
    # Adjust permissions (common for Laravel)
    # -----------------------------------------------
    RUN chown -R www-data:www-data storage bootstrap/cache \
        && chmod -R 775 storage bootstrap/cache
    
    # -----------------------------------------------
    # Expose PHP-FPM port & start the server
    # -----------------------------------------------
    EXPOSE 9000
    CMD ["php-fpm"]
    