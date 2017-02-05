<?php

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->prefix('posts')->group(function() {
    Route::get('/', 'PostController@index')->name('posts');
    Route::get('/add', 'PostController@add')->name('posts.add');
    Route::post('/add', 'PostController@addPost')->name('posts.add');
    Route::get('/{post}/edit', 'PostController@edit')->name('posts.edit');
    Route::put('/{post}/edit', 'PostController@editPost')->name('posts.edit');
    Route::get('/{post}/delete', 'PostController@delete')->name('posts.delete');
    Route::delete('/{post}/delete', 'PostController@deletePost')->name('posts.delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
