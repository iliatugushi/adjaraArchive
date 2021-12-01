# Requirements

Application is created using framweork Laravel, to run this app following requirements has to be met on platform:

-   PHP >= 7.2.5
-   BCMath PHP Extension
-   Ctype PHP Extension
-   Fileinfo PHP extension
-   JSON PHP Extension
-   Mbstring PHP Extension
-   OpenSSL PHP Extension
-   PDO PHP Extension
-   Tokenizer PHP Extension
-   XML PHP Extension
-   MySql

Also platform has to have composer installed. The database name and all required information is located in .env file.

# Installation

After all requirements are met, there are several command that has to be executed to run the project:

`composer install`

_This command will install all composer required libraries for system to work._

`php artisan key:generate`

_This command will create key for project._

`php artisan storage:link`

_This command will create link from storage to public path._

`php artian migrate:fresh --seed`

_This command will migrate all the tables, and store them to database, also it will run the seeders._

---

`php artisan optimize:clear`

_This command will clear all the cache._

# System Structure & Folders

As system is made on Laravel framework, we have mvc structure.

## Views

All The Views are located in resources/views folder structured.

## Models

All The models are located in app/models folder.

## Controllers

All the controllers are located in app/Http/Controllers Folder.

## Routes

All the routes are located in "routes" folder

## Database Migrations and Seeders

### Migrations

Database migrates with tables structures can be found in following directory: /database/migrations

### Seeders

Database seeders with tables structures can be found in following directory: /database/seeders
