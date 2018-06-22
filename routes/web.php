<?php

Route::get('/', 'PostsController@index');

// Route::get('posts/{post}', 'PostsController@show')->name('posts.show')->where('post', '[0-9]+');
Route::get('posts/create', 'PostsController@create')->name('posts.create');
Route::post('posts', 'PostsController@store')->name('posts.store');

Route::get('posts/{post}', 'PostsController@show')->name('posts.show');





Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
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
