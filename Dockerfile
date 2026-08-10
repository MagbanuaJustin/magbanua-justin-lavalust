ARG PHP_VERSION=8.2
FROM php:${PHP_VERSION}-apache

# Install extensions
RUN docker-php-ext-install pdo pdo_mysql

# Enable rewrite
RUN a2enmod rewrite

# Allow .htaccess (Simplified fix)
RUN sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Copy files
COPY . /var/www/html/

# Permissions
RUN chown -R www-data:www-data /var/www/html \
&& chmod -R 755 /var/www/html

EXPOSE 80
CMD ["apache2-foreground"]
