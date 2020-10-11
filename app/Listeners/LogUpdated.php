<?php

namespace App\Listeners;

use App\Events\ModelWasUpdated;

class LogUpdated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ModelWasUpdated $event)
    {
        $event->message;
        $event->data->logs()->create(['action' => $event->message, 'user_id' => \auth()->user()->id]);
    }
}
