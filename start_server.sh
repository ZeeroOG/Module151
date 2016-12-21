#!/bin/bash

# Script pour lancer le serveur de dev sous macOS
# par William Maillard
# !! Sera supprimé dans la PROD !!

echo "Starting MariaDB"
echo "================"
mysql.server start

echo "Starting PHP dev server"
echo "======================="
php -S localhost:8080
