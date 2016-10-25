<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class messagesenders extends Model
{
    //

    protected $table = 'message_senders';

    protected $fillable = [
        'user_id', 'send_date', 'message_id', 'receiver_id', 'conversation_id'
    ];

}
