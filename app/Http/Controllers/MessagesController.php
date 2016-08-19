<?php

namespace App\Http\Controllers;

use App\conversationParticipants;
use App\conversations;
use App\messagereceivers;
use App\messages;
use App\messagesenders;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MessagesController extends Controller
{
    //

    /**
     * @var messages
     */
    private $messages;
    /**
     * @var conversations
     */
    private $conversations;
    /**
     * @var messagesenders
     */
    private $messagesenders;
    /**
     * @var messagereceivers
     */
    private $messagereceivers;

    /**
     * MessagesController constructor.
     * @param conversations $conversations
     * @param messages $messages
     * @param messagesenders $messagesenders
     * @param messagereceivers $messagereceivers
     */
    public function __construct(conversations $conversations, messages $messages,
                                messagesenders $messagesenders,
                                messagereceivers $messagereceivers)
    {
        $this->middleware('auth');
        $this->user_id = Auth::user()['id'];
        $this->messages = $messages;
        $this->conversations = $conversations;
        $this->messagesenders = $messagesenders;
        $this->messagereceivers = $messagereceivers;
    }

    public function new_message(Request $request)
    {
       //dd(\Request::Input());

        $this->compile_and_send_message($request);
        Session::flash('message', 'Message Successfully Sent');
        return redirect()->back();
    }

    public function ReadMessages()
    {

        return view('messaging.chat');
        //dd($messages);
    }

    /**
     * @param Request $request
     */
    private function compile_and_send_message(Request $request)
    {

        /** @var create a new conversation $conversation */



        $current = conversations::whereSubject($request['subject'])->get();

        $flag = 0;

        foreach ($current as $convo)
        {
            $participation = conversationParticipants::whereConversation_id($convo->id)->get();
            foreach ($participation as $participant)
            {
                if ($participant->participant_id == $request['sender_id'])
                {
                    $flag = 1;
                    $conversation_id = $participant->conversation_id;
                }
            }
        }


        if ($flag != 1)
        {
            $conversation = conversations::create([
                'subject' => $request['subject']
            ]);

            //add conversation id to request
            $conversation_id = $conversation->id;

            //Create Participant Instance In Table For Sender
            $senderParticipant = new conversationParticipants();

            $senderParticipant->participant_id = $request['sender_id'];
            $senderParticipant->conversation_id = $conversation_id;

            $senderParticipant->save();



            //Create Participant Instance In Table For Receiver
            $receiverParticipant = new conversationParticipants();

            $receiverParticipant->participant_id = $request['receiver_id'];
            $receiverParticipant->conversation_id = $conversation_id;

            $receiverParticipant->save();
        }



        $request->request->add(['conversation_id' => $conversation_id]);

        //Create A New Message Inside That Conversation
        $message = messages::create([
            'body' => $request['body'],
            'conversation_id' => $request['conversation_id'],
            'receiver_id' => $request['receiver_id'],
            'sender_id' => $request['sender_id'],
            'read' => '0'
        ]);


    }
}
