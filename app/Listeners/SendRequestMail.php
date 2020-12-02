<?php

namespace App\Listeners;

use App\Mail\RequestMail;
use App\Notification;
use App\Setting;
use App\User;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;

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
        $roles = Role::has('users')->where('name', '<>', 'user')->get();
        $emails = collect([auth()->user()->email]);
        foreach ($roles as $role) {
            $email = $role->users()->where('email', '<>', auth()->user()->email)->pluck('email')->all();
            if ($email) {
                $emails->merge($emails);
            }
        }
        $setting = Setting::first();
        if($setting->admin_email_notification) Mail::to($emails)->send(new RequestMail($event->data));
        Notification::create(['action' => $event->message, 'url' => $event->data->url]);
    }
}
