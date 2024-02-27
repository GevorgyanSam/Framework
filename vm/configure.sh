#!/bin/bash

# Move project and configure permissions

cp -r /vagrant/ /var/www/html/
cd /var/www/html/
mv vagrant/ Framework
chmod 755 -R Framework/
chown www-data:www-data -R Framework/
