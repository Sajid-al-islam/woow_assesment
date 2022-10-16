<?php

use App\Post;

Route::get('/', function () {
    $posts = Post::paginate(10);
        
    return view('index', compact('posts'));
});

Route::get('/posts', 'PostController@index')->name('posts');

Route::get('/post/show/{id}', 'PostController@show')->name('post.show');

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', 'HomeController@index')->name('home');
    Route::get('/post/create', 'PostController@create')->name('post.create');
    Route::post('/post/store', 'PostController@store')->name('post.store');
    Route::get('/post/edit/{id}', 'PostController@edit')->name('post.edit');
    Route::post('/post/update/{id}', 'PostController@update')->name('post.update');
    Route::get('/post/update_status/{id}', 'PostController@update_status')->name('post.update_status');

    Route::post('/comment/store', 'CommentController@store')->name('comment.add');
    Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');
    Route::get('/comment/update_status/{id}', 'CommentController@update_status')->name('comment.update_status');
});





