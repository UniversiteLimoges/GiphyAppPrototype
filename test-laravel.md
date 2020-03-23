# Test-Laravel

Creating RestFull Api based on Laravel.

## Sources

[A Beginner’s Guide to Building a REST API with Laravel](https://hackernoon.com/a-beginners-guide-to-building-a-rest-api-with-laravel-5c717afd77fe)
_HackerNoon Ressource_





## Architecture
### Geoloation System (Front)
________________________
[Mozilla Doc](https://developer.mozilla.org/fr/docs/Web/API/Geolocation/getCurrentPosition)

> La méthode Geolocation.getCurrentPosition() fournit la position actuelle de l'appareil.

What are output datas ? :
* position.coords.latitude : 48.8582 (float)
* position.coords.longitude : 2.3387 (float)
* position.coords.accuracy : 500000  (int)

### Models
________________________

Client :

* id()
* string(name)
* string(mail)->unique()
* timestamp('email_verified_at')->nullable();
* string('password')
* rememberToken()
* timestamps()

* ipAddress('visitor')->nullable
* float('latitude', 8, 3)->nullable
* float('longitude', 8, 3)->nullable
* integer('accuracy')->nullable
* json('profile')->nullable


### Authentification System
__________________________________

`composer require laravel/ui`
puis `php artisan ui vue --auth`

Voir *http://127.0.0.1:8000/login* et *http://127.0.0.1:8000/register*


#### Config 

*config/auth.ph* **config file**









## Commands

**Launch Serve**
`php artisan serve [--port=]`



## Database

**Modify MySQL to SQLite**

```
#!.env
DB_CONNECTION=sqlite
#DB_HOST=127.0.0.1
#DB_PORT=3306
#DB_DATABASE=laravel
#DB_USERNAME=root
#DB_PASSWORD
```
> To enable foreign key constraints for SQLite connections, you should set the DB_FOREIGN_KEYS environment variable to true :

`DB_FOREIGN_KEYS=true`

### Migrations
[Doc](https://laravel.com/docs/7.x/migrations) 
__________________________________

located in : _/database/migrations/_

`$ php artisan make:migration <name> --table=<table-name> `


#### Add fields 
In migration file generated @up :

``` php
class UsersAddTraitsTagsGeoloc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // HERE !New attributes == fields
        });
    }
```

* 



### Eloquent
__________________________________

#### Models

Located in : _app/_

Each models extend : `Illuminate\Database\Eloquent\Model` namespace

To make model scalfolding then migration: 
`$ php artisan make:model <Name> --migration`

By Default: 
* Table name == class name + 's'
* Primary key == id



### SQLite access
____________________________________

`touche database/database.sqlite`

`sqlite3 database/database.sqlite`

***sqlite>***

`> .tables`  : see tables

`> .schema <table-name>`  







### Migration

See file _database/migrations_

`php artisan migrate`


