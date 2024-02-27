#!/bin/bash

# Move project and configure permissions

mv /vagrant
chmod 755 -R /var/www/html/Framework
chown www-data:www-data -R /var/www/html/Framework
