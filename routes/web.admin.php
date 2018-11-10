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

});
