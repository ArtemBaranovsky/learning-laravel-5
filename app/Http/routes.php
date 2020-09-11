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

Route::get('foo', ['middleware' => 'manager', function(){
    return 'this page is only be viewed by managers';
}]);