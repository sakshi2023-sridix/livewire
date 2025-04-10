<?php

// app/Notifications/PostLikedNotification.php

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class PostLikedNotification extends Notification
{
    public function __construct(public $liker, public $post) {}

    public function via($notifiable)
    {
        return ['database']; // we’ll store in DB
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => "{$this->liker->name} liked your post",
            'post_id' => $this->post->id,
            'user_id' => $this->liker->id,
        ];
    }
}
