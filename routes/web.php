<?php



Route::get('/', function () {
    return view('welcome');
});

Route::get('post', 'PostController@index')->name('post.index');
Route::POST('/addPost', 'PostController@addPost');
Route::POST('/editPost','PostController@editPost');
Route::POST('deletePost','PostController@deletePost');



















































