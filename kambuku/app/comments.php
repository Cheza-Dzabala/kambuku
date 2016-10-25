<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    //
    protected $table='comments';

    protected $fillable = [
        'name', 'email', 'comment', 'classified_id'
    ];
}
