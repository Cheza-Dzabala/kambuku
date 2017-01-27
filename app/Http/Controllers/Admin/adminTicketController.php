<?php

namespace App\Http\Controllers\Admin;

use App\eventClients;
use App\events;
use App\eventTickets;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class adminTicketController extends Controller
{
    //
    public function index()
    {
        $clients = eventClients::get();
        if($clients != null)
        {
            foreach ($clients as $client)
            {
                $userDetails = User::whereId($client->user_id)->first();
                $count = events::whereClientid($client->id)->count();
                $client = array_add($client, 'eventCount', $count);
                $client = array_add($client, 'name', $userDetails->name);
                $client = array_add($client, 'contactNumber', $userDetails->mobile);
            }
        }

        return view('admin.tickets.index', compact('clients'));
    }

    public function clients()
    {
        $users = User::get();
        return view('admin.tickets.clients', compact('users'));
    }

    public function clientsSave(Request $request)
    {
        //dd($request);
        eventClients::create([
            'user_id' => $request->user_id,
            'bankName' => $request->bankName,
            'bankBranch' => $request->bankBranch,
            'accountName' => $request->accountName,
            'accountNumber' => $request->accountNumber,
            'airtelMoneyNumber' => $request->airtelMoneyNumber,
            'tnmMpambaMoneyNumber' => $request->tnmMpambaMoneyNumber,
            'preferredPayments' =>  $request->preferredPayments,
        ]);

        return redirect()->route('admin.tickets');
    }



    public function events($id)
    {
        $client = eventClients::whereId($id)->first();
        return view('admin.tickets.newEvent', compact('client'));
    }

    public function eventsSave(Request $request)
    {

        if(isset($request->artwork))
        {

            $destinationPath = 'images/uploads/events/' . $request->clientId . '/';
            if(!File::exists($destinationPath))
            {
                $result = File::makeDirectory($destinationPath, $mode = 0777);
            }

            $file = $request->artwork;
            $img = Image::make($file);
            $filename = str_random(32) . '.' . $file->getClientOriginalExtension();
            $client_save_path = $destinationPath . $filename;
            $img->save($client_save_path, 60);
        }

        events::create([
              'clientId' => $request->clientId,
              'eventName' => $request->eventName,
              'eventDate' => $request->eventDate,
              'price' => $request->price,
              'venue' => $request->venue,
              'city' => $request->city,
              'time' => $request->time,
              'notes' => $request->eventNotes,
              'artwork' => $client_save_path,
              'isActive' => $request->isActive,
        ]);

        return redirect()->route('admin.tickets');
    }

    public function eventsView($id)
    {
        $events = events::whereClientid($id)->get();
        return view('admin.tickets.events', compact('events'));
    }

    public function eventsEdit($id)
    {
        $event = events::whereId($id)->first();
        return view('admin.tickets.editEvent', compact('event'));
    }

    public function eventUpdate(Request $request)
    {
        $input = $request->all();
        $event = events::whereId($request->id)->first();
        $event->fill($input);
        $event->save();
        return redirect()->route('admin.tickets.events.view', $request->clientId);
    }

    public function ticketsIndex()
    {
        $tickets = eventTickets::get();

        foreach ($tickets as $ticket)
        {
            $user = User::whereId($ticket->userId)->first();
            $event = events::whereId($ticket->eventId)->first();
            $ticket = array_add($ticket, 'eventName', $event->eventName);
            $ticket = array_add($ticket, 'venue', $event->venue);
            $ticket = array_add($ticket, 'date', $event->eventDate);
            $ticket = array_add($ticket, 'user', $user->name);
            $ticket = array_add($ticket, 'mobile', $user->mobile);
        }

        return view('admin.tickets.activity', compact('tickets'));
    }

    public function moderate($id)
    {
        $ticket = eventTickets::whereId($id)->first();

        if($ticket->bulkCode == null)
        {
            $ticketCount = '1';
            $code = $ticket->referenceCode;
            $activeStatus = $ticket->isActive;
            $type = 'single';
        }else{
            $ticketCount = eventTickets::whereBulkcode($ticket->bulkCode)->count();
            $code = $ticket->bulkCode;
            $activeStatus = $ticket->isActive;
            $type = 'bulk';
        }


        return view('admin.tickets.moderate', compact('ticketCount', 'code', 'activeStatus', 'type'));
    }

    public function saveModeration(Request $request)
    {
        if($request->type == 'bulk')
        {
            $tickets = eventTickets::whereBulkcode($request->code)->get();
            foreach ($tickets as $ticket)
            {
                $ticket->isActive = $request->isActive;
                $ticket->save();
            }
        }else{
            $ticket = eventTickets::whereReferencecode($request->code)->first();
            $ticket->isActive = $request->isActive;
            $ticket->save();
        }

        return redirect()->route('admin.tickets.index');
    }
}
