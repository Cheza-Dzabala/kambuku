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
            return response('Ticket Doesnt Exist', 304);
        }else{
            if($securityKey != $ticket->securityKey)
            {
                return response('ticket_security_keys_do_not_match', 400);
            }else if($ticket->isUsed == 1){
                return response('ticket_already_used', 400);
            }else{
                $ticket->isUsed = 1;
                $ticket->verifiedOn = Carbon::now();
                $ticket->save();
                return response('successfully_verified_ticket', 200);
            }
        }
    }

}
