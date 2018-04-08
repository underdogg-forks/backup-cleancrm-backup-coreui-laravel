<?php

Route::group(['namespace' => 'Api'], function() {
    Route::get('menus', 'MenuController@index');
});