<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
USE Carbon\Carbon;

class Online extends Model
{
    //

    protected $hidden = 'payload';
    protected $table = 'sessions';
    protected $visible = ['last_activity', 'user_id'];

}
