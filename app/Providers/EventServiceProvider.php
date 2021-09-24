<?php

namespace App\Providers;

<<<<<<< HEAD
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
=======
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
<<<<<<< HEAD
        Registered::class => [
            SendEmailVerificationNotification::class,
=======
        'App\Events\Event' => [
            'App\Listeners\EventListener',
>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
<<<<<<< HEAD
=======
        parent::boot();

>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb
        //
    }
}
