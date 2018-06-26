<?php

namespace App\Listeners;

use App\User;
use App\Jobs\SendPostUpdateEmail;
use App\Events\PostWasUpdatedEvent;

class PostWasUpdatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PostWasUpdatedEvent  $event
     *
     * @return void
     */
    public function handle(PostWasUpdatedEvent $event)
    {
        // logger($event->post->title . ' was updated');

        //trova autore post
        $user = $event->post->load('user');

        $admin = User::where('role', 'admin')->first();

        // $recipent = (auth()->id() == $event->post->user_id) ? $admin : $event->post->user;
        // $modifier = (auth()->id() !== $event->post->user_id) ? $admin : $event->post->user;

        if (auth()->id() == $event->post->user_id) {
            $recipent = $admin;
            $modifier = $event->post->user;
        } else {
            $recipent = $event->post->user;
            $modifier = $admin;
        }

        SendPostUpdateEmail::dispatch($recipent, $modifier, $event->post);
    }
}
