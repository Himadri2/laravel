#!/bin/bash

# Check if httpd service is running
if systemctl is-active --quiet httpd; then
    echo "httpd service is running. Stopping httpd..."
    sudo systemctl stop httpd
    echo "httpd service stopped successfully."
else
    echo "httpd service is not running."
fi

