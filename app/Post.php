<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // appartiene a un User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // appartiene a una Catagory
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    // ha 1+ Tag
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // ha 1+ Comment
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
