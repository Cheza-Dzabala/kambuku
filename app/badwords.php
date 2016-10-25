<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class badwords extends Model
{
    //

    protected $table = 'badwords';

    protected $fillable = [
      'words', 'is_active', 'name'
    ];
}
