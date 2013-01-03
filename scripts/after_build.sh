# Install latest apps - Copy contents of apps submodule into the core apps folder
#rsync -avz /var/www/apps/ /var/www/core/apps

# Install necessary 3rd party libraries
#rsync -avz /var/www/3rdparty/ /var/www/core/3rdparty

# Create data folder so that permissions can be applied immediately
# mkdir -m 0777 /var/www/core/data

# Replace setup.php with to use mysql credentials given by Pagoda Box
# cp -f /var/www/core/lib/setup.php /var/www/scripts/setup_original.php
# cp -f /var/www/scripts/setup_modified.php /var/www/core/lib/setup.php

# Replace installation template to hide credentials/settings request
# cp -f /var/www/scripts/templates/installation.php /var/www/core/core/templates/installation.php