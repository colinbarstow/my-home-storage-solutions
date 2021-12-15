<?php

namespace App\Providers;

use App\Events\ContactAdminResponded;
use App\Events\ContactCreated;
use App\Events\OrderAccepted;
use App\Events\OrderCancelled;
use App\Events\OrderRejected;
use App\Events\SendCampaign;
use App\Listeners\SendCampaignToUsers;
use App\Listeners\SendContactAdminRespondedNotification;
use App\Listeners\SendContactSubmittedNotification;
use App\Listeners\SendOrderAcceptedNotification;
use App\Listeners\SendOrderCancelledNotification;
use App\Listeners\SendOrderRejectedNotification;
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
        OrderAccepted::class => [
            SendOrderAcceptedNotification::class,
        ],
        OrderRejected::class => [
            SendOrderRejectedNotification::class,
        ],
        OrderCancelled::class => [
            SendOrderCancelledNotification::class,
        ],
        SendCampaign::class => [
            SendCampaignToUsers::class,
        ],
        ContactCreated::class => [
            SendContactSubmittedNotification::class
        ],
        ContactAdminResponded::class => [
            SendContactAdminRespondedNotification::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return true;
    }
}
