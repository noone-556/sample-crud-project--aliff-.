## About Project

This project is to show the crud operation using Laravel. This operation is to register employee, update, show information and delete record. 

## Setup Project

1. **Clone the Repository**
    - Clone the project repository from the following link: https://github.com/noone-556/sample-crud-project-aliff.git

2. Start xampp (apache and mysql)

3. **Copy Environment Configuration**
    - Run the command `copy .env.example .env` to create a `.env` file based on the example.
    - Open the `.env` file and locate the `DB_DATABASE` parameter.
    - Set the `DB_DATABASE` parameter value to `crud-sample` to match the imported database.


4. Run `composer install`
    - If getting an error `composer not found` then you need to manually download the composer at this link https://getcomposer.org/download/  

    - After finish install, then restart your notebook and run back the command.

    - If succeed can proceed below, if not check environment variables and check user variables. And then check path, click it then  make sure this path `C:\Users\{your user name}\AppData\Roaming\Composer\vendor\bin` is exist. 

5. Run `php artisan key:generate`
    - Will generate APP_KEY at env

6. Run `php artisan create:db`
    - Create database at mysql
    - You can check this at app/Console/Command/CreateDatabase.php

7. Run `php artisan migrate` 
    - Generate table for the database

8. Run `php artisan serve`
    - Run the program


### Download xampp 8.1.25


## Fresh install?
1. Download at this link https://www.apachefriends.org/download.html and choose PHP 8.1.25.



# Have xampp but different php version?
1. After git clone, there is folder `apache folder 8.1.25` which have folder php and apache version 8.1.25.
2. Use this folder at your xampp root folder.
3. You can rename the php and apache folder inside xampp, and replace with the one I provided.  


### Approach

- Started by creating a database at app/Command/CreateDatabase.php to create database at MySQL.

- Then designing database schema by using migrations.

- Created laravel models, controller and routes to handle CRUD operations.

- The frontend using blade templates with bootstrap and css for styling.

- Ajax was used for fetch, insert, update and delete record.

- Using datatables for pagination and search.


## Challenges

- Ensure proper validation for date fields and contract types required extra checks because there is insert and update operations. Both operation need to be same so the submit value will not be in conflict during backend process

- Handling dynamic enabling /disabling for kemaskini and insert end date. Insert end date logic work correctly but kemaskini eEnd encountered some conflict because the modal load existing values first. After change the value then it will trigger the dynamic enabling and disabling.

