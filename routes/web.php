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

// page d'accueil non conncetée
//Route::get('/', function () {
  //  return view('welcome');
//});

//
Auth::routes();

// page d'acceuil
Route::get('/home', 'HomeController@connected')->name('home'); // page après connection
Route::get('/', 'HomeController@index')->name('welcome'); // page hors connection

// Quacks
//Route::resource('quacks', 'QuackController');
route::get('/quacks/create', 'QuackController@create')->name('quacks.create');
route::post('/quacks', 'QuackController@store')->name('quacks.store');
route::get('quacks/{quack}', 'QuackController@show')->name('quacks.show');
route::get('/quacks/{quack}/edit','QuackController@edit')->name('quacks.edit');
route::put('/quacks/{quack}','QuackController@update')->name('quacks.update');
route::delete('/quacks/{quack}','QuackController@destroy')->name('quacks.delete');

// User
//route::resource('ducks', 'DucksController');
route::get('/profile', 'DucksController@index')->name('profile');
route::get('/settings/profile', 'DucksController@edit')->name('modify_user');
route::put('/setting/profile', 'DucksController@update')->name('update_user');
route::delete('/profile', 'DucksController@destroy')->name('delete_user');

// Comment
route::post('comments', 'CommentController@store')->name('comments.store');
route::delete('comments/{comment}', 'CommentController@destroy')->name('comments.delete');
