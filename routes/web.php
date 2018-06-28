<?php

Route::get('/', 'PostsController@index')->name('posts.index');
Route::resource('posts', 'PostsController')->except('index');
Auth::routes();

// Route::resource('posts.comments', 'CommentsController')->only('store', 'update', 'delete');

// creare
// Route::post('posts/{post}/comments', 'CommentsController@store');
// Route::patch('posts/{post}/comments/{comment}', 'CommentsController@udpate');
// Route::delete('posts/{post}/comments/{comments}', 'CommentsController@destroy');

// cancellare

// Route::get('deploy-webhook', 'GihubController@deply')
// Route::get('rebase-webhook', 'GihubController@rebase')


//POST //posts/1/comments -
//PUT //posts/1/comments -
//DELETE //posts/1/comments -

// Route::get('posts/create', 'PostsController@create')->name('posts.create');
// Route::post('posts', 'PostsController@store')->name('posts.store');
// Route::get('posts/{post}/edit', 'PostsController@edit')->name('posts.edit');
// Route::patch('posts/{post}', 'PostsController@update')->name('posts.update');
// Route::get('posts/{post}', 'PostsController@show')->name('posts.show');
// Route::delete('posts/{post}', 'PostsController@destroy')->name('posts.destroy');


// Route::get('posts/{post}', 'PostsController@show')->name('posts.show')->where('post', '[0-9]+');
// GET, POST, PATCH|PUT, DELETE

// posts
// REST - CRUD = Create, Read, Updata, Delete

// index - Lista risorse                                    - GET - /posts
// create - Visualizza form creazione nuovo record          - GET - /posts/create
// store - Salva nuovo record nel database                  - POST - /posts
// show - Mostra singolo record                             - GET - /posts/{post}
// edit - Visualizza form modifica record esistente         - GET - /posts/{post}/edit
// update - Aggiorna record esistente                       - PATCH - /posts/{post}
// destroy - Cancella record                                - DELETE - /posts/{post}
