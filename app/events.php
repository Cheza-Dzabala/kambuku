<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class events extends Model
{
    //
    protected $table = 'events';

    protected $fillable = [
        'clientId', 'eventDate', 'venue', 'city', 'time', 'eventName', 'isActive', 'artwork', 'notes', 'price'
    ];
}
