Steps to set up Laravel project
1. Clone project from git on some directory on computer
2.in console call: composer update
3.Setup mysql, create database
4.in config/database folder setup up database name, root and password
5.Create .env file in bikes folder, copy everything from .env.example file and setup database host, username and password in .env file
6.In console change directory into bikes and generate encryption key with command: php artisan key:generate
7.Migrate database with command: php artisan migrate
8.Populate database with command: php artisan db:seed
9. Call command: php artisan serve
10. project is on localhost:8000
11. Enjoy
