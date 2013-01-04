#!/bin/bash

echo "After-build hook is running."

echo "Installing latest official app files. This may take a minute."
rsync -aHz /var/www/apps/ /var/www/core/apps

echo "Installing necessary 3rd party library files."
mkdir -m 0755 /var/www/core/3rdparty
rsync -aHz /var/www/3rdparty/ /var/www/core/3rdparty

echo "Altering ownCloud installation file to self-configure for Pagoda Box."
cp -f /var/www/core/lib/setup.php /var/www/scripts/setup_original.php
cp -f /var/www/scripts/setup_modified.php /var/www/core/lib/setup.php
cp -f /var/www/scripts/templates/installation.php /var/www/core/core/templates/installation.php

echo "Setting folder permissions."
chown -R www-data:www-data /var/www/core/config /var/www/core/data
chown www-data:www-data /var/www/core/apps
chmod 750 /var/www/core/apps /var/www/core/config
chmod -R 770 /var/www/core/data

echo "Cleaning up Git submodules."
rm -rf -- /var/www/apps
rm -rf -- /var/www/3rdparty
