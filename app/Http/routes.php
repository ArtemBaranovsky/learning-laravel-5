<?php


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

interface BarInterface {}
class Bar implements BarInterface {}
class SecondBar implements BarInterface {}

App::bind('BarInterface', 'Bar');
//app()->bind('BarInterface', 'Bar');

//App::bind('Barlnterface', 'SecondBar');

Route:: get('bar', function(BarInterface $bar) {
//    dd($bar);
//    $bar = App::make('BarInterface');
//    $bar = app()['BarInterface']; // or reference a container as an array
    $bar = app('BarInterface'); // or pass container as an argument
    dd($bar);
});

Route::get('foo', 'FooController@foo');

Route::get('tags/{tags}', 'TagsController@show');

//Route::get('about', ['middleware' => 'auth', 'uses' => 'PagesController@about']);
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');

Route::resource('articles', 'ArticlesController');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
//    'register' => 'Auth\RegisterController',
]);

// Authentication routes...
//Route::get('auth/login', 'Auth\AuthController@getLogin');
//Route::post('auth/login', 'Auth\AuthController@postLogin');
//Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
//Route::get('auth/register', 'Auth\AuthController@getRegister');
//Route::post('auth/register', 'Auth\AuthController@postRegister');


/*Route::get('/articles', 'ArticlesController@index');
Route::get('/articles/create', 'ArticlesController@create');
Route::get('/articles/{id}', 'ArticlesController@show');
Route::post('/articles', 'ArticlesController@store');
Route::get('/articles/{id}/edit', 'ArticlesController@edit');*/

//Route::get('foo', ['middleware' => 'manager', function(){
//    return 'this page is only be viewed by managers';
//}]);