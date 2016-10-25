<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class safety_guidelines extends Model
{
    //
    protected $table = 'safety_guidelines';

    protected $fillable = [
        'guide', 'order', 'title', 'is_active'
    ];
}
