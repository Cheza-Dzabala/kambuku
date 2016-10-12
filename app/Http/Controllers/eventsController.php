<?php

namespace App\Http\Controllers;

use App\eventClients;
use App\events;
use Illuminate\Http\Request;

use App\Http\Requests;

class eventsController extends Controller
{
    //
    public function index()
    {
        $events = events::orderBy('id', 'DESC')->whereIsactive('1')->get();

        foreach ($events as $event)
        {
            $host = eventClients::whereId($event->clientId)->first();
            $event = array_add($event, 'host', $host->name);
        }

        return view('events.index', compact('events'));
    }
}
