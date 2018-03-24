# Build this using following commands
# docker build -t mikkohei13/pinnakisa-100lajia:latest .
# docker push mikkohei13/pinnakisa-100lajia:latest

FROM php:7.2-apache

WORKDIR /var/www/html/

# Add php extensions / modules
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Enable mod rewrite
RUN a2enmod rewrite

# Add app
COPY ./html /var/www/html

# Allow writing backup logs
RUN chmod a+w /var/www/html/backups
RUN chmod a+x /var/www/html/backups

EXPOSE 80
WORKDIR /var/www/
