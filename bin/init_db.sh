#!/bin/bash

/usr/bin/mysqld_safe &
sleep 5
mysql -u root -e "CREATE USER 'tournament'@'%' IDENTIFIED BY 'secret'; CREATE DATABASE tournament; GRANT ALL PRIVILEGES ON tournament.* TO 'tournament'@'%';"
