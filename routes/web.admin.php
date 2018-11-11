<?php

Route::group([
    'as' => 'admin.',
    'namespace' => 'Admin',
    'prefix' => 'admin',
    'middleware' => ['auth', 'admin']
], function() {

    Route::get('/', 'HomeController@index')->name('index');

    Route::get('approve/comments', 'HomeController@commentsApproveQueue')->name('approve.comments');

    Route::get('update/news', 'HomeController@updateNews')->name('update.news');

    Route::get('users', 'HomeController@showAllUsers')->name('users');
    Route::get('users/{id}', 'HomeController@showUser')->name('users.show');

});
