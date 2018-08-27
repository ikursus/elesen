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
Route::get('/users', function () {
    return 'Halaman Senarai Users';
});

# Route untuk tambah user baru
Route::get('/users/add', function () {
    return 'Halaman Tambah User Baru';
});

# Route untuk edit user
Route::get('/users/{id}/edit', function () {
    return 'Halaman Tambah User Baru';
});
