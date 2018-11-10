<?php

Route::group([
    'as' => 'app.',
], function () {

    Route::get('/', function () {
        return view('app.home.index', [
            'newslist' => App\Models\News::take(6)->get(),
            'reviews' => App\Models\Review::take(4)->get(),
            'posts' => App\Models\Post::take(8)->get()
        ]);
    })->name('home');

    Route::group([
        'as' => 'profile.',
        'prefix' => 'profile',
        'middleware' => ['auth']
    ], function () {
        Route::get('/', 'ProfileController@index')->name('index');
        Route::patch('update', 'ProfileController@update')->name('update');
    });

    Route::resource('news', 'NewsController');
    Route::post('news/{news}/comment', 'NewsController@addComment')->name('news.add-comment');

    Route::resource('posts', 'PostsController');
    Route::post('posts/{post}/comment', 'PostsController@addComment')->name('posts.add-comment');

    Route::resource('reviews', 'ReviewsController');
    Route::post('reviews/{review}/comment', 'ReviewsController@addComment')->name('reviews.add-comment');

    Route::resource('reviews', 'ReviewsController');
    Route::resource('posts', 'PostsController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('tags', 'TagsController');
    Route::resource('comments', 'CommentsController');

});
