# Use an official PHP Apache image as a base
FROM php:7.4-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the PHP script into the container
COPY upload.php /var/www/html/

# Add DirectoryIndex directive to Apache config
RUN echo "DirectoryIndex index.php" >> /etc/apache2/apache2.conf

# Set ServerName directive to suppress warning
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Expose port 80 to allow outside access to your app
EXPOSE 80

# Start Apache server when the container launches
CMD ["apache2-foreground"]
