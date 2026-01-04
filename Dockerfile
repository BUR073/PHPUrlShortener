FROM php:8.4.3-apache

# 1. Use the production configuration
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# 2. Install the PHP extensions for MySQL (Crucial Step!)
#    We install pdo_mysql for modern PHP development.
RUN docker-php-ext-install pdo pdo_mysql

# 3. Copy files AND set ownership
COPY --chown=www-data:www-data ./ /var/www/html