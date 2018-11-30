FROM php:5-apache
RUN apt-get update && apt-get install -y \
 git \
 && rm -rf /var/lib/apt/lists/*
WORKDIR /var/www/html
RUN git clone https://github.com/Nathan-LS/DataSystems_StudentProfManagementSystem.git
RUN mv DataSystems_StudentProfManagementSystem dbs

