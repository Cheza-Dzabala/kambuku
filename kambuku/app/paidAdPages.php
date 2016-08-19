<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paidAdPages extends Model
{
    //
    protected $table = 'advert_pages';

    protected $fillable =
        [
          'page_name', 'page_alias'
        ];
}
