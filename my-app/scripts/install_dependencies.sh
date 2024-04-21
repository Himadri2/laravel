#!/bin/bash

# Set PATH variable explicitly
export PATH="/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/opt/remi/php81/root/usr/bin:/usr/local/bin:/root/bin"

# Define log file path
LOG_FILE="/var/log/laravel_commands.log"

# Function to execute command and log output
execute_command() {
    # Execute command and redirect output to log file
    "$@" >> "$LOG_FILE" 2>&1
    # Check if the command was successful
    if [ $? -eq 0 ]; then
        echo "Command '$@' executed successfully." >> "$LOG_FILE"
    else
        echo "Error executing command '$@'. Check '$LOG_FILE' for details." >&2
        exit 1
    fi
}

# Navigate to Laravel directory
cd /var/www/html/laravel/ || { echo "Error: Unable to navigate to Laravel directory." >&2; exit 1; }

# Update composer dependencies
execute_command /usr/local/bin/composer update

# Install composer dependencies
execute_command /usr/local/bin/composer install

# Check if APP_KEY is blank in .env file
if grep -q "^APP_KEY=$" .env; then
    # Generate key if it's blank
    execute_command /opt/remi/php81/root/usr/bin/php artisan key:generate
else
    echo "APP_KEY is already set in .env file." >> "$LOG_FILE"
fi

# Run migrations
execute_command /opt/remi/php81/root/usr/bin/php artisan migrate

echo "All commands executed successfully."
