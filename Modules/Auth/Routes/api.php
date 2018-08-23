<?php

Route::group(['namespace' => 'Api'], function () {
    Route::get('permissions', 'PermissionsController@index');
});
