<?php

use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// })->name('user');

Route::post('login', 'Api\LoginController@login')->name('login');

Route::get('me', 'Api\MeController@me')->name('me')->middleware('jwt.auth');

Route::resource('posts', 'Api\PostsController');
