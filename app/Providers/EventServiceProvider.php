<?php

namespace App\Providers;

use App\Events\ModelWasCreated;
use App\Events\ModelWasDeleted;
use App\Events\ModelWasUpdated;
use App\Events\SubmitRequestMail;
use App\Listeners\LogCreated;
use App\Listeners\LogDeleted;
use App\Listeners\LogUpdated;
use App\Listeners\SendRequestMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ModelWasCreated::class => [
            LogCreated::class,
        ],
        ModelWasUpdated::class => [
            LogUpdated::class,
        ],
        ModelWasDeleted::class => [
            LogDeleted::class,
        ],
        SubmitRequestMail::class => [
            SendRequestMail::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
