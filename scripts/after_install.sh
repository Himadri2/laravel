#!/bin/bash

# Change the ownership to apache:apache
chown -R apache:apache /var/www/html/*

# Change the permissions to 755
chmod -R 755 /var/www/html/*

