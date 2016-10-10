<?php

namespace App\Http\Controllers\Admin;

use App\eventClients;
use App\events;
use App\Http\Controllers\Controller;
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
        return view('admin.tickets.index', compact('clients'));
    }

    public function clients()
    {
        return view('admin.tickets.clients');
    }

    public function clientsSave(Request $request)
    {
        eventClients::create([
            'name' => $request->name,
            'contactPerson' => $request->contactPerson,
            'contactNumber' => $request->contactNumber,
            'email' => $request->email,
            'postalAddress' => $request->postalAddress,
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
        return view('admin.tickets.events', compact('client'));
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
              'venue' => $request->venue,
              'city' => $request->city,
              'time' => $request->time,
              'notes' => $request->eventNotes,
              'artwork' => $client_save_path,
              'isActive' => $request->isActive,
        ]);

        return redirect()->route('admin.tickets');
    }


}
