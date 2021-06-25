# Cv-site/WorkBoard
## Unfinished project that was written on Laravel+Vue.js

**Requarements**

1. Docker

If you have Windows 10 before you need to install WSL 2:
https://docs.microsoft.com/en-us/windows/wsl/install-win10
Here you will find documentation for Docker Desktop:
https://docs.docker.com/docker-for-windows/install/

2. Laravel Sail

Project using Laravel Sail for work with Docker.
I don't think that you have to need to install it cuz i have installed it
before and it should work already but anyway here you can find documentation:
https://laravel.com/docs/8.x/sail

**How to run?**

In terminal pass the follow commands:

apt install make - let you to use a short syntax from make file;

make up - build docker container;

make migrate - run migration;

make seed-specialization - list for drop down on cv create page;

Your environment  db section should looks like:

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=cvsite
DB_USERNAME=admin
DB_PASSWORD=password

**Routes**

http://localhost - project;

http://localhost:8181 - phpmyadmin, password - password, user - admin;

**Bugs**

The main problem with create cv. I don't know how to solve problem with permission denied after 
you try save cv with avatar. If you change photo attribute from CvService in method store on random string
name it allow yu to avoid problem.






