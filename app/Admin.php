<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;



class Admin extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    //
    use Authenticatable, CanResetPassword;
    use SoftDeletes;

    protected $table = 'admin_users';

    protected $fillable = [
        'username', 'password', 'screenname', 'email'
    ];

    protected $hidden = [
        'password', 'created_at'
    ];
}
