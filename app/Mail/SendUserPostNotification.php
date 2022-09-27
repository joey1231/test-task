<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use \App\Models\UserNotification;

class SendUserPostNotification extends Mailable
{
    use Queueable, SerializesModels;
    private $post, $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Post $post)
    {
        $this->post = $post;
        $this->user = $user;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $notification = new UserNotification;
        $notification->post_id = $this->post->id;
        $notification->user_id = $this->user->id;
        $notification->status = true;
        $notification->save();
        return $this->view('mail.notification')
            ->to($this->user->email)
            ->subject('New Post Created')
            ->with(['post' => $this->post]);
    }
}
