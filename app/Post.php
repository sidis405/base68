<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // protected $primaryKey = 'slug';
    // public $increments = false;

    // protected $fillable = ['title', 'category_id', 'preview', 'body'];
    protected $guarded = [];

    // appartiene a un User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
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

    // accessors - getters
    // public function getTitleAttribute($title)
    // {
    //     return strtoupper($title);
    // }

    // mutators - setters
    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
        $this->attributes['slug'] = str_slug($title);
        // $this->attributes['user_id'] = auth()->id();
    }
}
