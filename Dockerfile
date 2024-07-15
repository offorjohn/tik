# Use an official PHP image as a parent image
FROM php:7.4-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the PHP script into the container
COPY upload.php /var/www/html/

# Expose port 80 to allow outside access to your app
EXPOSE 80

# Start Apache server when the container launches
CMD ["apache2-foreground"]
