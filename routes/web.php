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
//Route::resource('/login','Userscontroller');

Auth::routes();
Route::resource('/add', 'Userscontroller');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/packages_register', 'HomeController@Packages_register')->name('Packages_register');
Route::get('/search', 'HomeController@search')->name('search');
Route::post('/store', 'HomeController@store')->name('store');
Route::get('/edit/{edit}', 'HomeController@edit')->name('edit');
Route::patch('/update/{update}', 'HomeController@update')->name('update');
Route::delete('/destroy/{destroy}', 'HomeController@destroy')->name('destroy');

Route::get('/', function() {
    return view('welcome');
});
