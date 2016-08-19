<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewCommentEvent extends Event implements ShouldBroadcast
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public $data;
    public function __construct($name, $email, $comment, $title, $target)
    {
        //
        $this->data = array(
            'name' => $name,
            'email' => $email,
            'comment' => $comment,
            'title' => $title,
            'human_target' => $target
        );
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['comment-channel'];
    }
}
