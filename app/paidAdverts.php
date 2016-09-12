<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paidAdverts extends Model
{
    //
    protected $table = 'paid_adverts';

    protected $fillable = [
      'client_name', 'client_phonenumber', 'client_phonenumber2', 'client_address', 'page', 'ad_name', 'ad_type', 'is_targeted',
        'min_age', 'max_age', 'sub_category_id', 'expiry_date', 'is_active', 'images_path', 'clicks', 'is_active'
    ];
}
