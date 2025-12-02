Installation Process
This guide provides the steps required to set up and run the Laravel project locally from the repository.

Prerequisites
Before proceeding, ensure your local development environment meets the following requirements:

*PHP: Version 8.0 or higher (Required for Laravel 9+)

*Composer: The latest version of the PHP dependency manager.

*Git: Necessary for cloning the project repository.

*Database Server: MySQL

Getting Started
1. Clone the Repository
Clone the project source code from the repository using Git:

git clone https://github.com/proyecto 
Repository name: https://github.com/mariavictoriacontreras/dev_test.git
cd <your-project-folder>

2. Install PHP Dependencies
Install all the project dependencies defined in composer.json:
-> composer install

3. Environment Configuration
The project uses an environment file (.env) for database credentials and unique application key.

-Create Environment File: Copy the example file to create your local configuration file:

.env .example
as 
.env

-Generate Application Key: Generate a unique application key for security purposes:

->php artisan key:generate

4. Database Setup
Edit the newly created .env file and configure your local database connection details 

DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
DB_DATABASE=dev_test
# DB_USERNAME=root
# DB_PASSWORD=

Update the DB_DATABASE, DB_USERNAME, and DB_PASSWORD variables to match your local database settings.

5. Data Import
Important Note on Initial Data: Although the repository contains the necessary Laravel migrations and seeders (database/migrations and database/seeders), for logistical simplicity and to guarantee all initial system data (roles, default settings, etc.) is correctly configured, we recommend using the provided database backup file instead.

Located in this repository as:


Data Import Steps:
Create the Database: Use the database management tool MySQL Workbench to create an empty database matching the name specified in the DB_DATABASE=dev_test variable in your .env file.
This step will create all necessary tables and insert the required initial records.

6. Running the Application
Finally, start the Laravel development server to access the application in your browser:

Bash

php artisan serve
The application will be accessible at http://127.0.0.1:8000 (or the port indicated in your console).