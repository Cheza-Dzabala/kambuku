<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vouchers extends Model
{
    //
    protected $table = 'vouchers';

    protected $fillable = [
       'userId', 'listingId', 'voucherCost', 'referenceCode', 'isActive', 'purchaseDate'
    ];
}
