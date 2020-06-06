<?php

Route::resource('packs', 'PackController');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/widget', 'WidgetController@divisionIntoPackages')->name('widget');
