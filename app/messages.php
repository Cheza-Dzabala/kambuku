<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class messages extends Model
{
    //
    protected $table = 'messages';

    protected $fillable = [
        'body', 'has_attachment', 'subject', 'conversation_id', 'sender_id', 'receiver_id'
    ];
}
