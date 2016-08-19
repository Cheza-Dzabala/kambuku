<?php

namespace App\Http\Controllers\Api;

use App\cities;
use App\countries;
use App\Events\NewMessage;
use App\messages;
use App\sub_categories;
use App\User;
use Illuminate\Http\Request;
use App\messagereceivers;
use App\messagesenders;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    //
    /**
     * @var countries
     */
    private $countries;
    /**
     * @var cities
     */
    private $cities;
    /**
     * @var sub_categories
     */
    private $sub_categories;

    /**
     * ApiController constructor.
     * @param countries $countries
     * @param cities $cities
     * @param sub_categories $sub_categories
     */
    public function __construct(countries $countries, cities $cities, sub_categories $sub_categories)
    {

        $this->countries = $countries;
        $this->cities = $cities;
        $this->sub_categories = $sub_categories;
    }

    public function load_countries(){

        $countries = $this->countries->get();
        return $countries;
    }

    public function get_city($id){
        $cities = $this->cities->WhereCountry_id($id)->get()->toArray();

        return $cities;
    }


    public function get_subcategory($id)
    {
        $subcategory = $this->sub_categories->whereCategory_id($id)->get()->toArray();
        return response()->json($subcategory);
    }

    public function load_conversation(Request $request)
    {

        $sender = $request['sender_id'];
        $conversation_id = $request['conversation_id'];
        $user =  $request['user_id'];

        $messages = messagereceivers::whereConversation_id($conversation_id)
                ->get();


        foreach ($messages as $key => $value)
        {
            if ($value['user_id'] == $user)
            {
                DB::table('message_receivers')
                    ->whereId($value['id'])
                    ->update(['read_status' => 1]);
            }
        }


        $sender_details = User::whereId($sender)->get()->first();

        $conversation = DB::table('messages')
            ->orderBy('created_at', 'Asc')
            ->whereConversation_id($conversation_id)
            ->select('users.name', 'users.id', 'users.image_path', 'messages.*')
            ->join('users', 'sender_id', '=', 'users.id')
            ->get();


        //dd(json_encode($conversation));

       // dd($conversation);

        return json_encode($conversation);


    }

    public function send_message(Request $request)
    {
        //dd(\Request::Input());



        $message = messages::create([
            'body' => $request['body'],
            'conversation_id' => $request['conversation_id'],
            'receiver_id' => $request['receiver_id'],
            'sender_id' => $request['sender_id']
        ]);

        $message_id = $message->id;

        messagereceivers::create([
            'user_id' => $request['receiver_id'],
            'sender_id' => $request['sender_id'],
            'message_id' => $message_id,
            'conversation_id' => $request['conversation_id']
        ]);

        messagesenders::create([
            'message_id' => $message_id,
            'receiver_id' => $request['receiver_id'],
            'conversation_id' => $request['conversation_id'],
            //'send_date' => time(),
            'user_id' => $request['sender_id'],
        ]);

        $body = $request['body'];
        $target = $request['receiver_id'];
        $sender = $request['sender_id'];
        $conversation_id = $request['conversation_id'];

        Event::fire(new NewMessage($body, $target, $sender, $conversation_id));

        return 'sent';
    }
}
