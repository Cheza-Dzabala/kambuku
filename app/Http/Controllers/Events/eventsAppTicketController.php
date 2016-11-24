<?php

namespace App\Http\Controllers\Events;

use App\eventClients;
use App\events;

use App\eventTickets;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class eventsAppTicketController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('appAuthenticate');
    }

    public function index()
    {
        $token = $this->generateToken();
        $user = eventClients::whereUserId(Auth::user()['id'])->first();
        $events = events::whereClientid($user->id)->get()->toJson();
        return response($events)->header('token', $token);
    }

    public function getUserData()
    {
        $token = $this->generateToken();
        $user = User::whereId(Auth::user()['id'])->first()->toJson();
        return response($user)->header('token', $token);
    }

    public function countTickets()
    {
        $token = $this->generateToken();
        $user = eventClients::whereUserId(Auth::user()['id'])->first();
        $events = events::whereClientid($user->id)->get();
        foreach ($events as $event)
        {
            $count = eventTickets::whereEventid($event->id)->count();
            $event = array_add($event, 'ticket_count', $count);
        }

         return response($events->toJson())->header('token', $token);
    }

    private function generateToken()
    {
        $newToken = JWTAuth::getToken();
        $token = JWTAuth::refresh($newToken);
        return $token;
    }
}
