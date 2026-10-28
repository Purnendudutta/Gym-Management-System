FROM php:8.2-apache

# Install MySQL extensions for PHP
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Configure Apache to support Render's dynamic PORT or default to 80
RUN sed -i 's/Listen 80/Listen ${PORT:-80}/' /etc/apache2/ports.conf && \
    sed -i 's/<VirtualHost \*:80>/<VirtualHost \*:${PORT:-80}>/' /etc/apache2/sites-available/000-default.conf

# Copy all project files to Apache root
WORKDIR /var/www/html
COPY . /var/www/html/

# Ensure permissions
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

CMD ["apache2-foreground"]
