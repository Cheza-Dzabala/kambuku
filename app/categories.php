<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    //
    protected $table = 'categories';

    protected $fillable = [
      'name', 'fa_icons', 'is_tabbed', 'display_order'
    ];
}
