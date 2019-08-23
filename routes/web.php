<?php

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

// Authentication
Auth::routes();

// page d'acceuil
Route::get('/home', 'HomeController@connected')->name('home'); // page après connection
Route::get('/', 'HomeController@index')->name('welcome'); // page hors connection

// Users
Route::get('/users/{user}', 'UserController@show')->name('ducks.show');

// Accounts
route::get('/accounts/profile', 'AccountController@profile')->name('ducks.profile');
route::get('/accounts/editprofile', 'AccountController@edit')->name('ducks.edit');
route::put('/accounts/updateprofile', 'AccountController@update')->name('ducks.update');
route::delete('/accounts/', 'AccountController@destroy')->name('ducks.delete');

// Search
Route::get('/quacks/search', 'QuackController@search')->name('search');
// Quacks
Route::resource('quacks', 'QuackController')->except('index');


// Comments
route::post('/quacks/{quack}/comments', 'CommentController@store')->name('comments.store');
route::delete('/quacks/{quack}/comments/{comment}', 'CommentController@destroy')->name('comments.delete');
