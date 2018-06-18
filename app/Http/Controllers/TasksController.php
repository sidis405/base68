<?php

namespace App\Http\Controllers;

use App\Task;

class TasksController extends Controller
{
    public function index()
    {
        // $tasks = Task::get();
        // $tasks = Task::where('completed', 0)->get(); // where  'completed' = 1
        // $tasks = Task::completed()->get(); // queryScopes
        $tasks = Task::incomplete()->latest()->get(); // queryScopes

        return view('welcome', compact('tasks'));
    }

    //Route model binding
    public function show(Task $task)
    {
        return $task;
    }
}
