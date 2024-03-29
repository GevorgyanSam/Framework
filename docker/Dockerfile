FROM ubuntu:22.04

ENV DEBIAN_FRONTEND=noninteractive

WORKDIR /var/www/app

COPY . .

# Update system
RUN apt update && \
    apt full-upgrade -y && \
    apt autoremove -y && \
    apt autoclean

# Install dependencies
RUN apt install -y software-properties-common apache2 nano && \
    add-apt-repository ppa:ondrej/php && \
    apt install -y composer php php-curl php-cli php-json php-zip php-mbstring php-xml php-mysql php-imagick php-gd

# Configure server
RUN cp /var/www/app/docker/app.conf /etc/apache2/sites-available && \
    cd /etc/apache2/sites-available && \
    a2dissite 000-default.conf && \
    a2ensite app.conf && \
    service apache2 restart && \
    chmod -R 777 /var/www/app

EXPOSE 80

CMD ["apache2ctl", "-D", "FOREGROUND"]
