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
Route::get('/home', 'HomeController@connected'); // page après connection
Route::get('/', 'HomeController@index')->name('home'); // page hors connection

// route des quacks
//Route::resource('quacks', 'QuackController');
route::get('/quacks/create', 'QuackController@create')->name('quack.create');
route::post('/quacks', 'QuackController@store')->name('quack.store');
route::get('/quacks/','QuackController@edit')->name('quack.edit');
route::put('/quacks/','QuackController@update')->name('quack.update');
route::delete('/quacks/','QuackController@destroy')->name('quack.delete');

// route user
//route::resource('ducks', 'DucksController');
route::get('/profile', 'DucksController@index')->name('profile');
route::get('/settings/profile', 'DucksController@edit')->name('modify_user');
route::put('/setting/profile', 'DucksController@update')->name('update_user');
route::delete('/profile', 'DucksController@destroy')->name('delete_user');

