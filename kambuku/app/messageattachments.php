<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class messageattachments extends Model
{
    //
    protected $table='message_attachments';

    protected $fillable = [
        'message_id', 'filename'
    ];
}
