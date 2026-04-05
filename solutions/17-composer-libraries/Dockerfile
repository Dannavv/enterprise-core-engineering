# Lab 17: External Library Engine
FROM php:8.2-apache

# 1. Install System Dependencies (Unzip is needed for Composer)
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    && rm -rf /var/lib/apt/lists/*

# 2. Install Composer Globally
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 3. Standard drivers
RUN docker-php-ext-install mysqli pdo pdo_mysql

WORKDIR /var/www/html
