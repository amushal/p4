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
    if(Auth::user()){
        return view('home');
    }else{
        return view('welcome');
    }
});

Auth::routes();

Route::group(['middleware' => ['web','auth']], function () {

    Route::get('/index', 'HomeController@index');
    #Route::get('contacts.search', 'ContactController@search');
    Route::get('contacts.search', 'ContactController@search')->name('contacts.search');
    Route::get('contacts.index','ContactController@index')->name('contacts.index');
    Route::get('contacts.add', 'ContactController@add')->name('contacts.add');
    Route::get('contacts.edit','ContactController@edit')->name('contacts.edit');
    Route::post('contacts.save','ContactController@save')->name('contacts.save');
    Route::patch('contacts.update', 'ContactController@update')->name('contacts.update');
    Route::delete('contacts.destroy', 'ContactController@destroy')->name('contacts.destroy');

});

Route::get('/debug', function () {

    $debug = [
        'Environment' => App::environment(),
        'Database defaultStringLength' => Illuminate\Database\Schema\Builder::$defaultStringLength,
    ];

    /*
    The following commented out line will print your MySQL credentials.
    Uncomment this line only if you're facing difficulties connecting to the
    database and you need to confirm your credentials. When you're done
    debugging, comment it back out so you don't accidentally leave it
    running on your production server, making your credentials public.
    */
    #$debug['MySQL connection config'] = config('database.connections.mysql');

    try {
        $databases = DB::select('SHOW DATABASES;');
        $debug['Database connection test'] = 'PASSED';
        $debug['Databases'] = array_column($databases, 'Database');
    } catch (Exception $e) {
        $debug['Database connection test'] = 'FAILED: '.$e->getMessage();
    }

    dump($debug);
});
