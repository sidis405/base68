<?php

Route::get('/', 'TasksController@index');
Route::get('tasks/{task}', 'TasksController@show');

// Route::get('/', function () {
//     // $nome = 'Tom';

//     // $tasks = [
//     //     'studia laravel',
//     //     'studia flutter',
//     //     'leggi',
//     // ];

//     // $tasks = \DB::table('tasks')->get();
//     $tasks = \App\Task::all();
//     return view('welcome', compact('tasks'));
//     // return $tasks;

//     // return view('welcome', compact('nome'));
//     // return view('welcome')->withNome($nome);
//     // return view('welcome')->with(['nome' => $nome]);
//     // return view('welcome', ['nome' => $nome]);
// });

// tasks/1

// Route::get('tasks/{id}', function ($id) {
//     // $task = \DB::table('tasks')->find($id);
//     $task = \App\Task::find($id);

//     return $task;
// });
