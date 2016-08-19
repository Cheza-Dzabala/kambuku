<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contentPages extends Model
{
    //

    protected $table = 'contentPages';

    protected $fillable = [
        'title', 'header_id', 'order', 'is_active'
    ];
}
