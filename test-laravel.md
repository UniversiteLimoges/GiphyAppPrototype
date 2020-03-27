# Test-Laravel

Creating RestFull Api based on Laravel.

## Sources

[A Beginner’s Guide to Building a REST API with Laravel](https://hackernoon.com/a-beginners-guide-to-building-a-rest-api-with-laravel-5c717afd77fe)
_HackerNoon Ressource_





## Architecture
### Geolocation System (Front)
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

* ipAddress('visitor_ip')->nullable
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


### Workflow
___________________________________

Once user is connected via register or login, (ckeck authentification part, database and migrations), we will redirect to a profile vue to store some new data informations.

To this let's code some controlers snippets

#### HomeControler

[Path Customization](https://laravel.com/docs/7.x/authentication#path)   

> When a user is successfully authenticated, they will be redirected to the /home URI. You can customize the post-authentication redirect path using the HOME constant defined in your RouteServiceProvider:

```php
public const HOME = '/home';
```

> If you need more robust customization of the response returned when a user is authenticated, Laravel provides an empty authenticated(Request $request, $user) method that may be overwritten if desired:

```php
/**
 * The user has been authenticated.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  mixed  $user
 * @return mixed
 */
protected function authenticated(Request $request, $user)
{
    return response([
        //
    ]);
}
```

We will stay with '/home' default redirection : 
* controller : _/app/Http/Controllers/HomeController.php_
* vue : _/ressources/views/home.blade.php_ based on _/views/layouts/app.blade.php_

#### Add Middleware

`php artisan make:middleware <name>`

We add middleware which will add IP address to user database field.



## Commands

**Launch Serve**
`$ php artisan serve [--port=]`


**Display route list**
`$ php artisan route:list`


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

`$ php artisan make:migration <name> --[table | create]=<table-name> `


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

* ipAddress('visitor_ip')->nullable
* float('latitude', 8, 3)->nullable
* float('longitude', 8, 3)->nullable
* integer('accuracy')->nullable
* json('profile')->nullable

#### Modify Column
Make new migrations

``` php
public function up()
{
    Schema::table('Favs', function (Blueprint $table) {
        $table->string('name')->nullable->change();
    });
}
```


### Queries Builder
__________________________________
[How Laravel communicate with DB](https://laravel.com/docs/7.x/queries)




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















## Admin Pannel

Intsance of auth user
```php
public function update(Request $request)
{
    // $request->user() returns an instance of the authenticated user...
}
```


Middleware CheckRole
```php
namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (! $request->user()->hasRole($role)) {
            // Redirect...
        }

        return $next($request);
    }

```

Route Middleware Parameters
```php
Route::put('post/{id}', function ($id) {
    //
})->middleware('role:editor');
```


## CRUD controller ressource Fav
`php artisan make:controller PhotoController --resource --model=Fav `

Routes
`Route::resource('favs', 'FavController');`

* /favs == @index => fav.indexFav (show all favs tag)
* /favs/create == @create => addFormFav (send new tag)
    * redirect to POST:/favs == @store (add new tag in db)
* /favs/{Fav} == @delete => @index

```HTML
<li>#{{ $fav->name }}
        <form method="POST" action="{{ route('favs.destroy', ['fav' => $fav]) }}">
            @csrf
            @method('DELETE')
            <input type="submit" value="delete">
        </form>
</li>
```


## IP-Visitor
[Laravel GeoIP](https://lyften.com/projects/laravel-geoip/doc/)
[GitHub](https://github.com/Torann)

* `$ composer require torann/geoip`

* Add Provider & Alias in _config/app.php_

* `$ php artisan vendor:publish --provider="Torann\GeoIP\GeoIPServiceProvider" --tag=config` Compile _config/geoip.php_ file

 