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

Route::get('/', function () {
    if (Auth::user()) {
        return view('home');
    } else {
        return view('welcome');
    }
});

Auth::routes();

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/home', 'HomeController@index');
    Route::get('contacts/search', 'ContactController@search')->name('contacts.search');
    Route::get('contacts', 'ContactController@index')->name('contacts.index');
    Route::get('contacts/add', 'ContactController@add')->name('contacts.add');
    Route::get('contacts/{contact_id}', 'ContactController@edit')->name('contacts.edit');
    Route::post('contacts/save', 'ContactController@save')->name('contacts.save');
    Route::patch('contacts/{contact_id}', 'ContactController@update')->name('contacts.update');
    Route::delete('contacts/{contact_id}', 'ContactController@destroy')->name('contacts.destroy');
});