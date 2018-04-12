<?php

// Authentication Routes...
Route::get('login', 'LoginController@showLoginForm')->name('login');
Route::post('login', 'LoginController@login');
Route::post('logout', 'LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'ResetPasswordController@reset');

Route::prefix('admin')->middleware('auth')->group(function (){
    Route::get('/','AdminController@index')->name('admin.index');
    Route::prefix('users')->group(function (){
        Route::get('/','UserController@index')->name('admin.users.index');
        Route::get('/create','UserController@create')->name('admin.users.create');
        Route::post('/store','UserController@store')->name('admin.users.store');
        Route::get('/{id}/edit','UserController@edit')->name('admin.users.edit');
        Route::patch('/{id}','UserController@update')->name('admin.users.update');
    });
});
