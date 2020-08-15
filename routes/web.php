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
Route::get('/', 'GuestController@index')->name('home');
Route::get('/detail-album/{title}', 'GuestController@galerifoto')->name('galeri.foto');
Route::get('/like-foto/{id}', 'GuestController@likefoto')->name('like.foto');


Auth::routes([
    'register' => false,
    'reset' => false
]);

Route::get('/home', 'HomeController@index')->name('home');

//album route
Route::get('/album','AlbumController@index');
Route::get('/album/create','AlbumController@create')->name('album.create');
Route::post('/album','AlbumController@store')->name('album.store');
Route::get('/album/edit/{id}','AlbumController@edit')->name('album.edit');
Route::put('/album/update/{id}','AlbumController@update')->name('album.update');
Route::get('/album/delete/{id}','AlbumController@destroy')->name('album.destroy');

//galeri route
Route::get('/galeri','GaleriController@index');
Route::get('/galeri/create','GaleriController@create')->name('galeri.create');
Route::post('/galeri','GaleriController@store')->name('galeri.store');
Route::get('/galeri/edit/{id}','GaleriController@edit')->name('galeri.edit');
Route::put('/galeri/update/{id}','GaleriController@update')->name('galeri.update');
Route::get('/galeri/delete/{id}','GaleriController@destroy')->name('galeri.destroy');


//user route
Route::get('/user','UserController@index');
Route::get('/user/create','UserController@create')->name('user.create');
Route::post('/user','UserController@store')->name('user.store');
Route::get('/user/edit/{id}','UserController@edit')->name('user.edit');
Route::put('/user/update/{id}','UserController@update')->name('user.update');
Route::get('/user/delete/{id}','UserController@destroy')->name('user.destroy');