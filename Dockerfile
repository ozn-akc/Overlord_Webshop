# Use a base image with Apache and PHP
FROM php:apache

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Copy project files from the parent directory into the web server directory
COPY . /var/www/html

RUN docker-php-ext-install mysqli

# Expose port 80
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]