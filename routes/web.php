<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () { return view('home'); });

Auth::routes();

//Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/home', 'HomeController@index');
    Route::get('contacts/search', 'ContactController@search')->name('contacts.search');
    Route::get('/contacts', 'TagController@index')->name('contacts.index');
    Route::get('/contacts/create', 'ContactController@create')->name('contacts.create');
    Route::get('/contacts/{id}', 'ContactController@edit')->name('contacts.edit');
    Route::post('/contacts/store', 'ContactController@store')->name('contacts.store');
    Route::patch('/contacts/{id}', 'ContactController@update')->name('contacts.update');
    Route::delete('/contacts/{id}', 'ContactController@destroy')->name('contacts.destroy');
    Route::get('/contacts/tags/{tag}', 'TagController@index');

//});