<?php

namespace App\Events;

use App\Events\Event;
use App\search_terms;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SearchEvent extends Event
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public $data;
    public function __construct($term)
    {
        //
        $termUse = search_terms::where('term', 'LIKE', $term)->first();


        if ($termUse == null)
        {
            $newTerm = new search_terms();

            $newTerm->term = $term;
            $newTerm->count = 1;
            $newTerm->save();
        }else{
            $termUse->count += 1;
            $termUse->save();
        }

    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
