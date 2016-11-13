<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class eventTickets extends Model
{
    //
    protected $table = 'eventTickets';

    protected $fillable = [
        'eventId', 'userId', 'securityKey', 'verificationCode', 'isUsed', 'isActive', 'referenceCode', 'bulkCode', 'verifiedOn'
    ];
}
