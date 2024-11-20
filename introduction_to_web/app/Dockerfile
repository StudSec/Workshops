# Use an official PHP image with Apache
FROM php:7.4-apache

# Add sql
RUN docker-php-ext-install mysqli

# Copy app contents
COPY . /var/www/html/

# Set permissions for the uploads directory
RUN mkdir -p /var/www/html/uploads && chmod 777 /var/www/html/uploads
