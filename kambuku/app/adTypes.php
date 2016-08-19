<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class adTypes extends Model
{
    //

    protected $table = 'ad_types';

    protected $fillable = [
      'type_name', 'type_alias'
    ];
}
