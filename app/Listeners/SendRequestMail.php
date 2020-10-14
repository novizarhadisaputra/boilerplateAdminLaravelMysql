<?php

namespace App\Listeners;

use App\Mail\RequestMail;
use App\Notification;
use Illuminate\Support\Facades\Mail;

class SendRequestMail
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
    public function handle($event)
    {
        Mail::to(env('ADMIN_MAIL', 'novizarhadisaputra@gmail.com'))->send(new RequestMail($event->data));
        Notification::create(['action' => $event->message, 'url' => $event->data->url]);
    }
}
