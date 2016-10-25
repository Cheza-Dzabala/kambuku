<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class homeSliders extends Model
{
    //
    protected $table = 'home_sliders';

    protected $fillable = [
      'name', 'client_name', 'client_phoneNumber',
        'image_path', 'description', 'link_path', 'is_active',
        'header', 'sub_header', 'web_link', 'facebook_link', 'twitter_link'
    ];
}
