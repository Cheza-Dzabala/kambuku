<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sub_categories extends Model
{
    //
    protected $table = 'sub_categories';

    protected $fillable = [
      'name', 'category_id', 'fa_icons'
    ];
}
