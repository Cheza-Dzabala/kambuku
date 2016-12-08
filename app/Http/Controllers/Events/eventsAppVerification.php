<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use EventTickets;
use Illuminate\Http\Request;

use App\Http\Requests;

use Tymon\JWTAuth\Facades\JWTAuth;

class eventsAppVerification extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('appAuthenticate');
    }


    public function verify($vcode, $skey)
    {
        $token = $this->generateToken();
        $verificationCode = $vcode;
        $securityKey = $skey;
        $ticket = eventTickets::whereVerificationcode($verificationCode)->first();
        //return $ticket;
        if($ticket == null)
        {
            return response(json_encode('Ticket_Doesnt_Exist'))->header('token', $token);
        }else{
            if($securityKey != $ticket->securityKey)
            {
                return response(json_encode('ticket_security_keys_do_not_match'))->header('token', $token);
            }elseif($ticket->isUsed == 1){
                return response(json_encode('Ticket_already_used'))->header('token', $token);
            }else{
                $ticket->isUsed = 1;
                $ticket->verifiedOn = Carbon::now();
                $ticket->save();
                return response(json_encode('Successfully_verified_ticket'))->header('token', $token);
            }
        }
    }

    private function generateToken()
    {
        $newToken = JWTAuth::getToken();
        $token = JWTAuth::refresh($newToken);
        return $token;
    }
}
