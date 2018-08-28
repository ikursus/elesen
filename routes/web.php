<?php
# Route untuk authentication (login/logout/register/password reset)
Auth::routes();
# Route halaman selepas login
Route::get('/home', 'HomeController@index')->name('home');
# Route halaman utama aplikasi
Route::get('/', function () {
    return view('welcome');
});

# Route untuk paparan senarai users
Route::get('/users', 'UsersController@index')->name('users.index');

# Route untuk tambah user baru
Route::get('/users/add', 'UsersController@create')->name('users.create');

# Route untuk edit user
Route::get('/users/{id}/edit', 'UsersController@edit')->name('users.edit');
