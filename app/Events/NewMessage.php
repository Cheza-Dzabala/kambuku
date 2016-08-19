<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Foundation\Auth\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewMessage extends Event implements ShouldBroadcast
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public $data;

    public function __construct($body, $target, $sender, $conversation_id)
    {
        //
        $sender_details = User::whereId($sender)->first();



        $this->data = array(
          'message_body' => $body,
            'human_target' => $target,
            'sender' => $sender,
            'sender_name' => $sender_details['name'],
            'conversation_id' => $conversation_id,
        );
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['message-channel'];
    }
}
