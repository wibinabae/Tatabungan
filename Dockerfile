# Gunakan image resmi PHP sebagai base image
FROM php:8.2-fpm

# Install ekstensi PHP yang diperlukan untuk Laravel
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip git && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd pdo pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy semua file aplikasi ke dalam container
COPY . .

# Install dependensi Laravel dengan Composer
RUN composer install

# Set permission folder storage
RUN chmod -R 775 storage bootstrap/cache

# Expose port yang digunakan oleh PHP-FPM
EXPOSE 9000
