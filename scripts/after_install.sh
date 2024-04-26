#!/bin/bash

# Directory to backup
backup_source="/var/www/html/laravel/"

# Destination directory for backup
backup_destination="/var/www/html/laravel_bkp/"

# Create a timestamp for the backup filename
timestamp=$(date +"%Y%m%d_%H%M%S")

# Create the backup filename with timestamp
backup_filename="laravel_backup_${timestamp}.tar.gz"

# Create the backup using tar
tar -czf "${backup_destination}${backup_filename}" -C "${backup_source}" .

# Check if the backup was created successfully
if [ $? -eq 0 ]; then
    echo "Backup created successfully: ${backup_filename}"
else
    echo "Failed to create backup"
    exit 1
fi

# Optional: Clean up old backups if necessary

# Exit with success status
exit 0

