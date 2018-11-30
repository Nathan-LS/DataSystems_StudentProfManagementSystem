FROM php:5-apache
RUN docker-php-ext-install pdo pdo_mysql
RUN apt-get update && apt-get install -y \
 git \
 && rm -rf /var/lib/apt/lists/*
RUN git clone https://github.com/Nathan-LS/DataSystems_StudentProfManagementSystem.git
RUN mv DataSystems_StudentProfManagementSystem/* /var/www/html

