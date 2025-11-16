## About Project

This project is to show the crud operation using Laravel. This operation is to register employee, update, show information and delete record. 


## Setup Project

1. **Clone the Repository**
    - Clone the project repository from the following link: [https://github.com/noone-556/skc-omr.git](https://github.com/noone-556/skc-omr.git)


2. Start xampp (apache and mysql)
2. Run php artisan create:db

3. **Copy Environment Configuration**
    - Run the command `cp .env.example .env` to create a `.env` file based on the example.
    - Open the `.env` file and locate the `DB_DATABASE` parameter.
    - Set the `DB_DATABASE` parameter value to `crud-sample` to match the imported database.

4. Run php artisan migrate 
6. Run php artisan serve

### Download xampp 8.1.25

1. Need to have php 8.1 and above
2. If you have version below 8.1, change php and apache folder at xammp folder to 8.1.25 and above