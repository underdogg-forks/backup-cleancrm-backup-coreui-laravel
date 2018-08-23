<?php

Route::prefix('settings')->name('settings.')->group(function () {
    Route::get('menus', 'MenuController@index')->name('menus.index');
    Route::post('menus', 'MenuController@store')->name('menus.store');
    Route::patch('menus/{menu}', 'MenuController@update')->name('menus.update');
    Route::delete('menus/{menu}', 'MenuController@destroy')->name('menus.destroy');
});