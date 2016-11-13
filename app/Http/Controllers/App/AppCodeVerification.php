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
    public function verify(Request $request)
    {

        $verificationCode = $request->verificationCode;
        $securityKey = $request->securityKey;
        $ticket = eventTickets::whereVerificationcode($verificationCode)->first();
        //return $ticket;
        if($ticket == null)
        {
            return 'ticket_does_not_exist';
        }else{
            if($securityKey != $ticket->securityKey)
            {
                return 'ticket_security_keys_do_not_match';
            }else if($ticket->isUsed == 1){
                return 'ticket_already_used';
            }else{
                $ticket->isUsed = 1;
                $ticket->verifiedOn = Carbon::now();
                $ticket->save();
                return 'successfully_verified_ticket';
            }
        }
    }

}
