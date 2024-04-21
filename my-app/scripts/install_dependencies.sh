#!/bin/bash

# Define log output directory
LOG_DIR="/var/log/script1_logs"
mkdir -p "$LOG_DIR"

# Set log file name with current timestamp
LOG_FILE="$LOG_DIR/script1_log_$(date +'%Y-%m-%d_%H-%M-%S').txt"

# Redirect all output to the log file
exec > "$LOG_FILE" 2>&1

# Define the directory path
ls -la
DIRECTORY="/var/www/html/laravel/"

# Print the current directory location
echo "Current Directory: $(pwd)"

# Navigate to the directory
cd "$DIRECTORY"

# List all files and folders, including hidden ones
echo "Listing all files and folders in $DIRECTORY:"
ls -la

# Update composer dependencies
echo "Updating composer dependencies..."
composer update

# Install composer dependencies
echo "Installing composer dependencies..."
composer install

# Check if APP_KEY is blank in .env file
if grep -q 'APP_KEY=' .env; then
    echo "APP_KEY already exists in .env file."
else
    # Generate the application key
    echo "Generating APP_KEY..."
    php artisan key:generate
fi

# Run database migrations
echo "Running database migrations..."
php artisan migrate
