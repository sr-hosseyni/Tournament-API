#!/bin/bash

/usr/bin/mysqld_safe &
sleep 5
mysql -u root -e "CREATE USER 'bms'@'%' IDENTIFIED BY 'secret'; CREATE DATABASE bms; GRANT ALL PRIVILEGES ON bms.* TO 'bms'@'%';"