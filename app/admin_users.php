<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;


class admin_users extends Authenticatable
{
    //


    protected $table = 'admin_users';

    protected $fillable = [
      'username', 'password', 'screenname', 'email'
    ];

    protected $hidden = [
        'password', 'created_at'
    ];

}
