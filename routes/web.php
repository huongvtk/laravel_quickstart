<?php

Route::get('change-language/{language}', 'HomeController@changeLanguage')->name('user.change-language');

Route::group(['middleware' => 'locale'], function() {
    Route::get('change-language/{language}', 'HomeController@changeLanguage')
        ->name('user.change-language');
});

Route::get('/', 'TaskController@index');

Route::resource('/task', 'TaskController', ['except' => ['index']]);
