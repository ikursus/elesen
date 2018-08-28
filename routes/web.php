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

# Paparkan senarai categories
Route::get('/categories', 'CategoriesController@index');
# Paparkan borang tambah category baru
Route::get('/categories/add', 'CategoriesController@create');
# Simpan data tambah category baru
Route::post('/categories/add', 'CategoriesController@store');
# Paparkan borang edit category
Route::get('/categories/{id}/edit', 'CategoriesController@edit');
# Simpan data kemaskini category
Route::patch('/categories/{id}/edit', 'CategoriesController@update');
# Delete data berdasarkan rekod id
Route::delete('/categories/{id}', 'CategoriesController@destroy');
