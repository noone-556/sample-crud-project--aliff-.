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
    - After finish then restart your notebook and run back the command.
    -if succeed can proceed below, if not check environment variables 

5. Run `php artisan key:generate`

6. Run `php artisan create:db`

7. Run `php artisan migrate` 

8. Run `php artisan serve`


### Download xampp 8.1.25

## Fresh install?
1. Download at this link https://www.apachefriends.org/download.html and choose PHP 8.1.25.

# Have xampp but different php version?

1. After git clone, there is folder `apache folder 8.1.25` which have folder php and apache version 8.1.25.
2. Use this folder at your xampp root folder.
3. You can rename the php and apache folder inside xampp, and replace with the one I provided.  