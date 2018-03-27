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

Route::prefix('admin')->group(function (){
    Route::get('/','AdminController@index')->name('admin.index');
    Route::prefix('users')->group(function (){
        Route::get('/','UserController@index')->name('admin.users.index');
        Route::post('/store','UserController@store')->name('users.store');
        Route::get('/{id}','UserController@show');
        Route::patch('/{id}','UserController@update');
    });
});
