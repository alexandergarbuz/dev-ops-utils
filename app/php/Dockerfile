# Use the official PHP image as a base image
FROM php:8.1-apache

# Set the working directory
WORKDIR /var/www/html/public

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html/public

# Install required packages and PHP extensions
RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo_mysql \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Uncomment the following line if you want to change the Apache configuration to use port 8080
#RUN sed -i 's/Listen 80/Listen 8080/' /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf

# Expose port 80 to the outside world
EXPOSE 80

# Define the environment variable
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Update the Apache configuration to use the new document root
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Run the command to start Apache
CMD ["apache2-foreground"]
