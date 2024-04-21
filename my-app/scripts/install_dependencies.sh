#!/bin/bash

# Define log output directory
LOG_DIR="/var/log/script1_logs"
mkdir -p "$LOG_DIR"

# Set log file name with current timestamp
LOG_FILE="$LOG_DIR/script1_log_$(date +'%Y-%m-%d_%H-%M-%S').txt"

# Redirect all output to the log file
exec > "$LOG_FILE" 2>&1

# Print the current directory location
echo "Current Directory: $(pwd)"

# Define the directory path
DIRECTORY="/var/www/html/laravel/"

# Navigate to the directory
cd "$DIRECTORY" || exit 1

# Check if directory exists
if [ ! -d "$DIRECTORY" ]; then
    echo "Error: Directory $DIRECTORY not found."
    exit 1
fi

# List all files and folders, including hidden ones
echo "Listing all files and folders in $DIRECTORY:"
ls -la

# Update composer dependencies
echo "Updating composer dependencies..."
/usr/local/bin/composer self-update
/usr/local/bin/composer install --no-interaction --no-dev --optimize-autoloader

# Check composer install exit status
if [ $? -ne 0 ]; then
    echo "Error: Composer install failed."
    exit 1
fi

# Check if APP_KEY is blank in .env file
if grep -q 'APP_KEY=' .env; then
    echo "APP_KEY already exists in .env file."
else
    # Generate the application key
    echo "Generating APP_KEY..."
    /opt/remi/php81/root/usr/bin/php artisan key:generate
fi

# Run database migrations
echo "Running database migrations..."
/opt/remi/php81/root/usr/bin/php artisan migrate --force

# Check migration exit status
if [ $? -ne 0 ]; then
    echo "Error: Database migration failed."
    exit 1
fi

echo "Installation completed successfully."
