<?php

namespace App\Listeners;

use App\Events\OrderRejected;
use App\Mail\OrderRejectedEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendOrderRejectedNotification
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
     * @param  OrderRejected  $event
     * @return void
     */
    public function handle(OrderRejected $event)
    {
        Mail::to($event->order->user->email)->send(new OrderRejectedEmail($event->order));
    }
}
