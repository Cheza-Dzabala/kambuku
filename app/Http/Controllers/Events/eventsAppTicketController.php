<?php

namespace App\Http\Controllers\Events;

use App\events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;

class eventsAppTicketController extends Controller
{
    //
    public function index()
    {
        $events = events::get()->toJson();
        return $events;
    }
}
