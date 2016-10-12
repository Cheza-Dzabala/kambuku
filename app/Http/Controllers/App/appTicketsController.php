<?php

namespace App\Http\Controllers\App;

use App\Classes\ticketsClass;
use App\events;
use App\eventTickets;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class appTicketsController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('appAuthenticate',  ['except' => ['allTickets']]);

    }

    public function createTicket(Request $request)
    {
        $newToken = $this->generateToken();
        $ticketClass = new ticketsClass();
        $ticketGenerate = $ticketClass->generate($request);
        return $ticketGenerate->header('token', $newToken);
    }

    public function viewTickets()
    {
        $newToken = $this->generateToken();
        $ticketClass = new ticketsClass();
        $viewTickets = $ticketClass->viewTicket();
        return response(compact('viewTickets'))
            ->header('token', $newToken);
    }

    /**
     * @return mixed
     */
    private function generateToken()
    {
        $newToken = JWTAuth::getToken();
        return $newToken;
    }

    public function allTickets()
    {
        $class = new ticketsClass();
        $tickets = $class->allTicket();
        $newToken = $this->generateToken();
        return $tickets->toJson()->header('token', $newToken);
    }
}
