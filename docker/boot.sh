#!/bin/bash

apt-get update && apt-get upgrade -y && apt-get autoremove -y && apt-get autoclean

apt-get install -y software-properties-common
add-apt-repository ppa:ondrej/php

apt-get install -y composer php php-curl php-cli php-json php-zip php-mbstring php-xml php-mysql php-imagick php-gd

cd /var/www/app
cp .env.example .env
composer install

service apache2 start

cp /var/www/app/docker/app.conf /etc/apache2/sites-available/
cd /etc/apache2/sites-available/
a2dissite 000-default.conf
a2ensite app.conf
service apache2 reload
a2enmod rewrite
service apache2 restart

apt-get autoremove -y && apt-get autoclean