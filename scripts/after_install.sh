#!/bin/bash

# Directory paths
source_dir="/var/www/html/laravel"
backup_dir="/var/www/html"

# Timestamp for the backup file
timestamp=$(date +"%Y%m%d%H%M%S")

# Backup filename
backup_file="laravel_backup_$timestamp.tar.gz"

# Create a tar archive of the Laravel folder
tar -czf "$backup_dir/$backup_file" -C "$source_dir" .

echo "Backup created: $backup_dir/$backup_file"

