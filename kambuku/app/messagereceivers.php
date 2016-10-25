<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class messagereceivers extends Model
{
    //
    protected $table = 'message_receivers';

    protected $fillable = [
        'message_id', 'user_id', 'sender_id', 'read_status', 'conversation_id'
    ];

}
