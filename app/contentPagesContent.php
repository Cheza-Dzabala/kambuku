<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contentPagesContent extends Model
{
    //

    protected $table = 'contentPages_content';

    protected $fillable = [
        'contentPage_id', 'content', 'order', 'title'
    ];
}
