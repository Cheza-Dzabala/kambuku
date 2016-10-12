<?php

namespace App\Http\Controllers\App;

use App\Classes\ticketsClass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use Tymon\JWTAuth\Facades\JWTAuth;

class appTicketsController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('appAuthenticate');

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
        return $viewTickets->header('token', $newToken);
    }

    /**
     * @return mixed
     */
    private function generateToken()
    {
        $newToken = JWTAuth::parseToken()->refresh();
        return $newToken;
    }
}
