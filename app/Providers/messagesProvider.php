<?php

namespace App\Providers;

use App\conversations;
use App\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\conversationParticipants;

class messagesProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('partials.messaging.active_chats', function ($view){
            $user = Auth::user()['id'];

            $particpation = conversationParticipants::get();

            $conversations = [];

            foreach ($particpation as $party)
            {
              if ($party->participant_id == $user)
              {
                $conversation = conversations::whereId($party->conversation_id)->first();

                $otherUser = conversationParticipants::whereConversation_id($conversation->id)
                    ->where('participant_id', '!=', $user)->first();

                $otherUserDetails = User::whereId($otherUser->participant_id)->first();

               //  dd($otherUserDetails);

                $other_name = $otherUserDetails->name;
                $other_id = $otherUserDetails->id;
                $other_image = $otherUserDetails->image_path;
                $conversation_name = $conversation->subject;
                $conversation_id = $party->conversation_id;

                $compiled = array(
                    'name' => $other_name,
                    'other_id' => $other_id,
                    'image' => $other_image,
                    'conversation_name' => $conversation_name,
                    'conversation_id' => $conversation_id
                );

                //dd($compiled);

               $conversations = array_add($conversations, $conversation_name, $compiled);

              }
            }
           // dd($conversations);
            $view->with('conversations', $conversations);

        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
