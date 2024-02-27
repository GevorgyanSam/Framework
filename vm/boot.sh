#!/bin/bash

# Updating system

apt update
apt full-upgrade -y
apt autoremove -y
apt autoclean

# Installing dependencies

apt install -y apache2 default-mysql-server
apt install -y php php-cli php-common php-curl php-gd php-json php-mbstring php-mysql php-xml php-zip
apt install -y composer
