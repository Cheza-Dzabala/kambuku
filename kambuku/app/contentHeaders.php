<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contentHeaders extends Model
{
    //
    protected $table = 'contentHeaders';

    protected $fillable = [
        'title', 'order', 'is_active'
    ];

}
