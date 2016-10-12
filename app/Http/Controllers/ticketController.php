<?php

namespace App\Http\Controllers;

use App\Classes\ticketsClass;
use App\eventClients;
use App\events;
use App\eventTickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ticketController extends Controller
{
    //
    public function buyTicket($id)
    {
        $ticketId = $id;
        return view('events.securityKey', compact('ticketId'));
    }

    public function generate(Request $request)
    {
        $ticketClass = new ticketsClass();
        $generate = $ticketClass->generate($request);

        if($generate == 'successful')
        {
            return redirect()->route('tickets.view');
        }

    }

    public function viewTickets()
    {
        $ticketClass = new ticketsClass();
        $events = $ticketClass->viewTicket();
        return view('events.tickets', compact('events'));
    }
}
