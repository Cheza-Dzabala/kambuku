<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class conversationParticipants extends Model
{
    //
    protected $table = 'conversation_participants';

    protected $fillable = [
      'conversation_id', 'participant_id'
    ];
}
