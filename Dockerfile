FROM php:8.4.3-apache

ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# 1. Use the production configuration
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# 2. Install the PHP extensions for MySQL (Crucial Step!)
#    We install pdo_mysql for modern PHP development.
RUN docker-php-ext-install pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 3. Copy files AND set ownership
COPY --chown=www-data:www-data ./ /var/www/html