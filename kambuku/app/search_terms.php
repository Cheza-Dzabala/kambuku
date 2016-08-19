<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class search_terms extends Model
{
    //
    protected $table = 'search_terms';

    protected $fillable = [
        'term', 'count'
    ];
}
