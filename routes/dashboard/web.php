<?php

Route::name('dashboard.')->prefix('dashboard')->middleware(['auth'])->group(function () {

    Route::get('/', 'WelcomeController@index')->name('welcome');

    //book routes
    Route::resource('books', 'BookController');

    //language routes
    Route::resource('languages', 'LanguageController');

    //translator routes
    Route::resource('translators', 'TranslatorController');

});