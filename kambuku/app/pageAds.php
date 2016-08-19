<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pageAds extends Model
{
    //
    protected $table = 'page_ads';

    protected $fillable = [
        'page_name', 'advert_id', 'is_active'
    ];
}
