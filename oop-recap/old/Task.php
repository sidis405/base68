<?php

class Task
{
    public $title;
    public $description;
    public $completed = false;

    public function __construct($title, $description)
    {
        $this->title = $title;
        $this->description = $description;
    }

    public function complete()
    {
        $this->completed = true;
    }
}

$task = new Task('Oop', 'Impara concetti base di oop');

$task->complete();

// $task2 = new Task('Impara Laravel');

var_dump($task);
