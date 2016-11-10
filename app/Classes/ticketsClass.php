<?php
/**
 * Created by PhpStorm.
 * User: cheza
 * Date: 10/11/16
 * Time: 2:54 PM
 */

namespace App\Classes;


use App\eventClients;
use App\events;
use App\eventTickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ticketsClass
{
    public function allTicket()
    {
        $events = events::orderBy('id', 'DESC')->whereIsactive('1')->get();

        foreach ($events as $event)
        {
            $host = eventClients::whereId($event->clientId)->first();
            $event = array_add($event, 'host', $host->name);
        }

        return $events;
    }
    public function generate(Request $request)
    {
        //dd($request);
        $event =  events::whereId($request->eventId)->first();
        // dd($event);
        $host = eventClients::whereId($event->clientId)->first();
        // dd($host);
        $securityKey = encrypt($request->securityKey);
       // dd($securityKey);

        if ($request-> numberTickets > 1)
        {
            list($bulkCode, $referenceCode) = $this->getBulkCodes($event);
        }else{
            list($referenceCode, $bulkCode) = $this->getReferenceCode($event);
        }

        $i = 0;
        while ($i < $request->numberTickets)
        {
            $verificationCode = $host->id.$event->id.str_random(32);
            eventTickets::create([
                'eventId' => $request->eventId,
                'userId' => Auth::user()['id'],
                'securityKey' => $securityKey,
                'verificationCode' => $verificationCode,
                'isUsed' => '0',
                'referenceCode' => $referenceCode,
                'bulkCode' => $bulkCode
            ]);
            $i++;
        }



        return 'successful';
    }

    public function viewTicket()
    {
        $tickets = eventTickets::whereUserid(Auth::user()['id'])->get();
        $bulk = '';
        $events = [];
        $i = 0;
        foreach ($tickets as $ticket)
        {
            if($ticket->referenceCode == null)
            {
                if ($bulk != $ticket->bulkCode)
                {
                    $num = eventTickets::whereBulkcode($ticket->bulkCode)->count();
                    $ev = events::whereId($ticket->eventId)->first();
                    $client = eventClients::whereId($ev->clientId)->first();
                    $ticket = array_add($ticket, 'number_tickets', $num);
                    $ticket = array_add($ticket, 'host', $client->name);
                    $merged = array_merge($ev->toArray(), $ticket->toArray());
                    $events = array_add($events, $i, $merged);
                    $bulk = $ticket->bulkCode;
                }
                $i++;
            }else{
                $ev = events::whereId($ticket->eventId)->first();
                $ticket = array_add($ticket, 'number_tickets', 1);
                $client = eventClients::whereId($ev->clientId)->first();
                $ticket = array_add($ticket, 'host', $client->name);
                $merged = array_merge($ev->toArray(), $ticket->toArray());
                $events = array_add($events, $i, $merged);
                $i++;
            }

        }
        dd($events);

        return $events;
        // dd($events);

    }


    /**
     * @param $event
     * @return array
     */
    private function getBulkCodes($event)
    {
        $bulkCode = Auth::user()['id'] . $event->id . str_random(3);
        $referenceCode = null;

        $codes = eventTickets::get();
        foreach ($codes as $code)
        {
            if ($code->bulkCode == $bulkCode)
            {
                $this->restartFunctionBulkCode($event);
            }
        }
        return array($bulkCode, $referenceCode);
    }

    private function restartFunctionBulkCode($event)
    {
        $this->getBulkCodes($event);
    }

    /**
     * @param $event
     * @return array
     */
    private function getReferenceCode($event)
    {
        $referenceCode = Auth::user()['id'] . $event->id . str_random(3);
        $bulkCode = null;
        $codes = eventTickets::get();
        foreach ($codes as $code)
        {
            if ($code->$referenceCode == $referenceCode)
            {
                $this->restartFunctionReferenceCode($event);
            }
        }
        return array($referenceCode, $bulkCode);
    }

    private function restartFunctionReferenceCode($event)
    {
        $this->getReferenceCode($event);
    }
}