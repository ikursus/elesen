<?php
# Route untuk authentication (login/logout/register/password reset)
Auth::routes();
# Route halaman selepas login
Route::get('/home', 'HomeController@index')->name('home');
# Route halaman utama aplikasi
Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {

    # Route untuk paparan senarai users
    Route::get('/users', 'UsersController@index')->name('users.index');
    # Route untuk AJAX Request datatables senarai users
    Route::get('/users/datatables', 'UsersController@datatables')->name('users.datatables');
    # Route untuk tambah user baru
    Route::get('/users/add', 'UsersController@create')->name('users.create');
    # Simpan data tambah user baru
    Route::post('/users/add', 'UsersController@store')->name('users.store');
    # Route untuk edit user
    Route::get('/users/{id}/edit', 'UsersController@edit')->name('users.edit');
    # Simpan data kemaskini user
    Route::patch('/users/{id}/edit', 'UsersController@update')->name('users.update');
    # Delete data user berdasarkan ID
    Route::delete('/users/{id}', 'UsersController@destroy')->name('users.destroy');


    # Paparkan senarai categories
    Route::get('/categories', 'CategoriesController@index')->name('categories.index');
    # Route untuk AJAX Request datatables senarai categories
    Route::get('/categories/datatables', 'CategoriesController@datatables')->name('categories.datatables');
    # Paparkan borang tambah category baru
    Route::get('/categories/add', 'CategoriesController@create')->name('categories.create');
    # Simpan data tambah category baru
    Route::post('/categories/add', 'CategoriesController@store')->name('categories.store');
    # Paparkan template senarai lesen berdasarkan category ID
    Route::get('/categories/{id}/licenses', 'CategoriesController@licenses')->name('categories.licenses');
    # AJAX Request untuk senarai licenses berdasarkan ID category
    Route::get('/categories/{id}/licenses/datatables', 'CategoriesController@licensesDatatables')->name('categories.licenses.datatables');
    # Paparkan borang edit category
    Route::get('/categories/{id}/edit', 'CategoriesController@edit')->name('categories.edit');
    # Simpan data kemaskini category
    Route::patch('/categories/{id}/edit', 'CategoriesController@update')->name('categories.update');
    # Delete data berdasarkan rekod id
    Route::delete('/categories/{id}', 'CategoriesController@destroy')->name('categories.destroy');


    # Paparkan senarai licenses
    Route::get('/licenses', 'LicensesController@index')->name('licenses.index');
    # Paparkan borang tambah license baru
    Route::get('/licenses/add', 'LicensesController@create')->name('licenses.create');
    # Simpan data tambah license baru
    Route::post('/licenses/add', 'LicensesController@store')->name('licenses.store');
    # Paparkan borang edit license
    Route::get('/licenses/{id}/edit', 'LicensesController@edit')->name('licenses.edit');
    # Simpan data kemaskini license
    Route::patch('/licenses/{id}/edit', 'LicensesController@update')->name('licenses.update');
    # Delete data berdasarkan rekod id
    Route::delete('/licenses/{id}', 'LicensesController@destroy')->name('licenses.destroy');

});
