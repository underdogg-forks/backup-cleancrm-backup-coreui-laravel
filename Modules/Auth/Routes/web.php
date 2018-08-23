<?php

Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login')->name('post.login');
    Route::post('logout', 'LoginController@logout')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::prefix('settings')->group(function () {
        Route::resource('users', 'UsersController');
    });
});