<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//php artisan route:list
// Accueil
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Accueil once connected
Route::get('/home', 'HomeController@index')->name('home');

// Fav
Route::resource('/favs', 'FavController');

// User
Route::resource('/user', 'UserController')->only([
	'index', 'edit', 'update'
]);

Route::get('/users', 'UserController@listUsers');

// Test Branch
// Route::get('/test', 'TestController@viewTest')->name('test');
// Route::get('/modifyTest', 'TestController@modifyTest');
// Route::get('/modifyTestForm/{id}', 'TestController@modifyTestForm');
// Route::post('/applyModify/{id}', 'TestController@applyModify');

// To clear the app
Route::get('/clean', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cleared";
});
