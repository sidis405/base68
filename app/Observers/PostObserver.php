<?php

namespace App\Observers;

use App\Post;
use App\Events\PostWasUpdatedEvent;
use Illuminate\Support\Facades\Storage;

class PostObserver
{
    public function deleting(Post $post)
    {
        $post->tags()->sync([]);
        Storage::delete($post->cover);
    }

    public function updated(Post $post)
    {
        event(new PostWasUpdatedEvent($post));
    }
}
