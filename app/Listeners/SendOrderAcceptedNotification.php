<?php

namespace App\Listeners;

use App\Events\OrderAccepted;
use App\Mail\OrderAcceptedEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendOrderAcceptedNotification
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
     * @param  OrderAccepted  $event
     * @return void
     */
    public function handle(OrderAccepted $event)
    {
        Mail::to($event->order->user->email)->send(new OrderAcceptedEmail($event->order));
    }
}
