# Use the official PHP image with Apache
FROM php:7.4-apache

# Install MySQL and PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli

# Copy the application code to the Apache root directory
COPY . /var/www/html/

# Set the proper permissions for the Apache web directory
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expose port 80 for HTTP access
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
