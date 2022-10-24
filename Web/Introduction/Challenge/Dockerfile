FROM ubuntu:18.04

# Dependancies
ENV DEBIAN_FRONTEND noninteractive
RUN apt-get update
RUN apt-get install --assume-yes mysql-server libmysqlclient-dev apache2 php libapache2-mod-php php-mysql

# Database
RUN service mysql start && mysql -uroot -p$PWD -e "create database db; CREATE TABLE db.users (username varchar(80), password varchar(80));"
RUN service mysql start && mysql -uroot -p$PWD -e "INSERT INTO db.users (username, password) VALUES  \
    ('Aidan', 'supersecretpasssword42');"
RUN service mysql start && mysql -uroot -p$PWD -e "CREATE USER php@localhost IDENTIFIED BY 'phppassword'; GRANT SELECT ON *.* TO php@localhost; FLUSH PRIVILEGES;"

# Set files
COPY index.php /var/www/html/
RUN mkdir /var/www/html/uploads
# Dangerous ik
RUN chmod 777 /var/www/html/uploads
COPY supersecretfileuploader.php /var/www/html
COPY start.sh /
RUN chmod +x /start.sh

# Expose the http port
EXPOSE 80

# remove default index.html so it resorts to index.php
RUN rm /var/www/html/index.html

# Start everything
ENTRYPOINT /start.sh
