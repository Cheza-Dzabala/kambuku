<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class conversations extends Model
{
    //
    protected $table = 'conversations';

    protected $fillable = [
        'subject'
    ];
}
