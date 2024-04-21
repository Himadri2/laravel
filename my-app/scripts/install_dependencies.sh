#!/bin/bash

# Define the directory path
ls -la
DIRECTORY="/var/www/html/laravel/"

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
