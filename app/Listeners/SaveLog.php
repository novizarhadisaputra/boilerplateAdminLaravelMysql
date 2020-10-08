<?php

namespace App\Listeners;

use App\Events\ModelWasCreated;
use App\Log;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SaveLog
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
    public function handle(ModelWasCreated $event)
    {
        $event->message;
        $event->data->logs()->create(['action' => $event->message, 'user_id' => \auth()->user()->id]);
    }
}
