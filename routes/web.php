<?php

//Auth::logout();

Route::get('/', function () {
    flash('hello')->important();
    flash('hell');

    return view('layouts.master');
})->name('dashboard')->middleware('auth');
