<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class classified_images extends Model
{
    //
    protected $table = 'classified_images';

    protected $fillable = [
      'classified_id', 'filename'
    ];
}
