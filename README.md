## Examtable
* This is a technical task to analyze my logical and technical skills with using Laravel web framework

## Introduction
This task is a CRUD application to add many exam questions with four options on each question.
The question has different categories like technical, aptitude, and logical. The questions are displayed on the page in a categorized manner.


#### Database Setup
The Laravel app needs a MySQL database running on the host machine to work.
That way, it is easier to use it with hosted/remote databases such as cPanel, Amazon RDS, etc.
To setup your database locally:
* Open the mysql config file (`/etc/mysql/my.cnf` on Ubuntu) with your preferred editor 
    e.g `sudo vim /etc/mysql/my.cnf`
* Append the line below to the end of the file so that MySQL can listen on all interfaces.

    `bind-address   = 0.0.0.0`
* Save the file and restart the MySQL server with:

    `sudo systemctl restart mysql`
* Update the database `.env` variables in the project root folder i.e:
```
DB_CONNECTION=mysql
# You can find the DB host by running `ip -4 addr show docker0 | grep -Po 'inet \K[\d.]+'` (on Linux)
DB_HOST=172.17.0.1
DB_PORT=3306
DB_DATABASE=YOUR_DATABASE_NAME
DB_USERNAME=YOUR_MYSQL_USERNAME
DB_PASSWORD=YOUR_MYSQL_PASSWORD
```

Go to `database\seeds\DatabaseSeeder.php` file and uncomment this line
```php
    // $this->call(CategorySeeder::class);
```
then run `php artisan db:seed` to seed the `categories` database table.

### Running the app
* `cd` into the project folder (if you're not already there)
* Run `php artisan serve` to serve the application.

The app should now be available at `http://localhost:8000`
