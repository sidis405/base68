<?php

namespace App\Jobs;

use App\Post;
use App\User;
use App\Mail\PostUpdateEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendPostUpdateEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

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
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        echo 'dentro il job ' . date('H:i:s') . "\n";
        Mail::to($this->recipient)->send(new PostUpdateEmail($this->recipient, $this->modifier, $this->post));
        echo 'fine job ' . date('H:i:s') . "\n";
    }
}
