<?php

namespace App\Http\Controllers;

use App\Classes\ticketsClass;
use App\eventClients;
use App\events;
use App\eventTickets;
use Endroid\QrCode\QrCode;
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

    public function viewCodes($id)
    {
        $sample = eventTickets::whereId($id)->first();

        if($sample->isActive == 0)
        {
            return redirect()->route('tickets.view');
        }else{
            $event = events::whereId($sample->eventId)->first();
            $i = 0;
            $tickets = [];
            if ($sample->bulkCode == null)
            {
                $sample = array_add($sample, 'eventName', $event->eventName);
                $tickets = array_add($tickets, $i, $sample);
            }else{
                $samples = eventTickets::whereBulkcode($sample->bulkCode)->get();

                foreach ($samples as $sample)
                {
                    $sample = array_add($sample, 'eventName', $event->eventName);
                    $tickets = array_add($tickets, $i, $sample);
                    $i++;
                }
            }


            return view('events.codes', compact('tickets', 'event'));
        }

    }

    /**
     * @param $ticket
     * @return QrCode
     */
    public function makeQrCode($text)
    {
        if (preg_match('/eventId/', $text))
        {
            $str=$text;
            $del="eventId=";
            $pos=strpos($str, $del);
            $eventId=substr($str, $pos+strlen($del), strlen($str));
        }

        $event = events::whereId($eventId)->first();
        $qrCode = new QrCode();
        $qrCode
            ->setText($text)
            ->setSize(300)
            ->setPadding(10)
            ->setErrorCorrection('high')
            ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
            ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
            ->setLabel('Name: '.$event->eventName.' Date: '.$event->eventDate.' Time: '.$event->time)
            ->setLabelFontSize(10)
            ->setImageType(QrCode::IMAGE_TYPE_PNG);

        header('Content-Type: ' . $qrCode->getContentType());
       $qrCode->render();

    }

}
