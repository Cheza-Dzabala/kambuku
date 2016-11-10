<?php

namespace App\Http\Controllers;

use App\Classes\ticketsClass;
use App\eventClients;
use App\events;
use Illuminate\Http\Request;

use App\Http\Requests;

class eventsController extends Controller
{
    //
    public function index()
    {
        $class = new ticketsClass();
        $events = $class->allTicket();
        //dd($events);
        return view('events.index', compact('events'));
    }
}
