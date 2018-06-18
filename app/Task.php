<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // protected $table = 'the_tasks';

    public function scopeCompleted($query)
    {
        return $query->where('completed', 1);
    }

    public function scopeIncomplete($query)
    {
        return $query->where('completed', 0);
    }
}
