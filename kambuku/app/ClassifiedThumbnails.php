<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassifiedThumbnails extends Model
{
    //
    protected $table='classified_thumbnails';

    protected $fillable = [
        'filename', 'classified_id'
    ];
}
