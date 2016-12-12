<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class appDependancies extends Model
{
    //

    protected $table = 'appDependencies';

    protected $fillable = [
      'name', 'image_path'
    ];
}
