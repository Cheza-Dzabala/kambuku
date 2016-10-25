<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userType extends Model
{
    //
    protected $table = 'user_types';

    protected $fillable = [
      'name'
    ];
}
