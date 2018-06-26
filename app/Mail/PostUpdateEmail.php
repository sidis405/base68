<?php

namespace App\Mail;

use App\Post;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostUpdateEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $recipient;
    public $modifier;
    public $post;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $recipient, User $modifier, Post $post)
    {
        $this->recipient = $recipient;
        $this->modifier = $modifier;
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('An article has been modified.')->markdown('emails.posts.updated-email');
    }
}
