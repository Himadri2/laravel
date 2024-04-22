#!/bin/bash

# Restart httpd service
echo "Restarting httpd service..."
sudo systemctl restart httpd
echo "httpd service restarted successfully."

# Restart php81-php-fpm.service
echo "Restarting php81-php-fpm.service..."
sudo systemctl restart php81-php-fpm.service
echo "php81-php-fpm.service restarted successfully."

