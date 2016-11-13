<?php

namespace App\Http\Controllers\App;

use App\eventTickets;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class AppCodeVerification extends Controller
{
    //
    public function verify($vcode, $skey)
    {
       // return $vcode.$skey;
        $verificationCode = $vcode;
        $securityKey = $skey;
        $ticket = eventTickets::whereVerificationcode($verificationCode)->first();
        //return $ticket;
        if($ticket == null)
        {
            return response(json_encode('Ticket_Doesnt_Exist'));

        }else{
            if($securityKey != $ticket->securityKey)
            {
                return response(json_encode('ticket_security_keys_do_not_match'));

            }elseif($ticket->isUsed == 1){
                return response(json_encode('Ticket_already_used'));

            }else{
                $ticket->isUsed = 1;
                $ticket->verifiedOn = Carbon::now();
                $ticket->save();
                return response(json_encode('Successfully_verified_ticket'));
            }
        }
    }

}
