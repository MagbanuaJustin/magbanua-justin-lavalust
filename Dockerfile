ARG PHP_VERSION=8.2

FROM php:8.2-apache

# Install PDO MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Allow .htaccess overrides (simplified approach)
RUN echo "AllowOverride All" > /etc/apache2/mods-available/override.conf

# Copy app files
COPY . /var/www/html/

# Fix permissions
RUN chown -R www-data:www-data /var/www/html \
&& chmod -R 755 /var/www/html

EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
