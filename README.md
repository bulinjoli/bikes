<h1>Steps to set up Laravel project</h1>
<ul>
<li>1. Clone project from git on some directory on computer</li>
<li>2.in console call: composer update</li>
<li>3.Setup mysql, create database</li>
<li>4.in config/database folder setup up database name, root and password</li>
<li>5.Create .env file in bikes folder, copy everything from .env.example file and setup database host, username and password in .env file</li>
<li>6.In console change directory into bikes and generate encryption key with command: php artisan key:generate</li>
<li>7.Migrate database with command: php artisan migrate</li>
<li>8.Populate database with command: php artisan db:seed</li>
<li>9. Call command: php artisan serve</li>
<li>10. project is on localhost:8000</li>
<li>11. Enjoy</li>
</ul>
