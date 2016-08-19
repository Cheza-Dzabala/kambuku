<?php

namespace App\Events;

use App\classifieds;
use App\Events\SomeEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class classified_view
{
    /**
     * @var classifieds
     */
    private $classifieds;

    /**
     * Create the event listener.
     *
     * @param classifieds $classifieds
     */
    public function __construct(classifieds $classifieds)
    {
        //
        $this->classifieds = $classifieds;
        $this->handle($classifieds);
    }

    /**
     * Handle the event.
     *
     * @param classifieds $classified
     * @internal param \App\Events\SomeEvent $event
     */
    public function handle(classifieds $classified)
    {
        //
        $classified->increment('view_count');
        $classified->view_count += 1;

    }
}
