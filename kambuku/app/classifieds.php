<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class classifieds extends Model
{
    //
    protected $table = 'classifieds';

    protected $fillable = [
        'user_id', 'title', 'description', 'category_id', 'sub_category_id', 'country', 'city', 'keywords', 'image_path',
        'country_id', 'state_id', 'city_id', 'have_image', 'condition', 'price', 'is_active'
    ];
}
