<?php

namespace App;

use App\Events\PostWasUpdatedEvent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    // protected $primaryKey = 'slug';
    // public $increments = false;

    // protected $fillable = ['title', 'category_id', 'preview', 'body'];
    protected $guarded = ['id'];

    // public static function boot()
    // {
    // parent::boot();

    // static::deleting(function ($post) {
    //     $post->tags()->sync([]);
    //     Storage::delete($post->cover);
    // });

    // static::updated(function ($post) {
    //     event(new PostWasUpdatedEvent($post));
    // });
    // }

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

    public function setCoverAttribute($cover)
    {
        // $this->attributes['cover'] = Storage::disk('s3')->putFile('covers', $cover);
        $this->attributes['cover'] = $cover->store('covers');
    }

    // public function setTagsAttribute($tags)
    // {
    //     $this->tags()->sync($tags);
    // }

    public function getCoverAttribute($cover)
    {
        // return ($cover) ? 'storage/' . $cover : '/cover.jpg'; // null coalescence operator
        return ($cover) ?? '/cover.jpg'; // null coalescence operator
        // return ($cover) ? $cover : '/cover.jpg'; // operatore ternario
        // if ($cover) {
        //     return $cover;
        // }

        // return '/cover.jpg';
    }

    private function getSlugNames($slug)
    {
        //altri slug uguali != id
        // -2 -3
    }
}
