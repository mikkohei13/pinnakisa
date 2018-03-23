# Build this using following commands
# docker build -t mikkohei13/pinnakisa-100lajia:latest .
# docker push mikkohei13/pinnakisa-100lajia:latest

FROM richarvey/nginx-php-fpm:1.3.5

# Copy PHP scripts files to image
COPY ./html/* /var/www/html/

EXPOSE 80
