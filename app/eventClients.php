<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class eventClients extends Model
{
    //
    protected $table = 'eventClients';

    protected $fillable = [
        'name', 'contactPerson', 'contactNumber', 'email', 'postalAddress', 'bankName',
        'bankBranch', 'accountName', 'accountNumber', 'airtelMoneyNumber', 'tnmMpambaMoneyNumber',
        'preferredPayments',
    ];
}
