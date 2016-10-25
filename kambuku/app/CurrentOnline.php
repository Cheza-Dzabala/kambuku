<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurrentOnline extends Model
{
    //
    public $table='current_online';

    public $fillable = [
      'user_id', 'time', 'ip_address'
    ];
}
