<?php


Route::group(['middleware' => 'auth', 'prefix' => 'panel'], function() {

    Route::get('user', function () {
        return 'Halaman user';
    });

    Route::get('admin', function () {
        return 'Halaman admin';
    });

});

Route::get('/', function () {
    # Jika tidak, paparkan template welcome
    return view('welcome');
})->where('username', '[A-Za-z]+');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
