# Spring 2018 Database Systems Project

## Running with Docker

Run the demo via docker-compose.

Create your ```docker-compose.yml``` file with the follow contents:

```
version: '3'
services:
  web:
    image: nathanls/332filestructuresdatasystems
    ports:
      - 80:80
    volumes:
      - sqlInit:/var/www/html/SQL
  dbHost:
    image: mariadb:10.2
    environment:
      MYSQL_ROOT_PASSWORD: pass
      MYSQL_DATABASE: db
    volumes:
      - sqlInit:/docker-entrypoint-initdb.d
    depends_on:
      - web
volumes:
  sqlInit:
 ```
Start the project with:

```docker-compose up -d```

You can access the application at localhost:80

To shut down the application, run:

```docker-compose down -v```

## Usage
You can access the administrative module by clicking log in and logging in as a professor with the ID of: 1. The administrative module allows for the creation of new students, classes, etc.
