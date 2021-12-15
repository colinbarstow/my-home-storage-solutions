<?php

namespace App\Listeners;

use App\Events\OrderCancelled;
use App\Mail\OrderCancelledEmail;
use App\Mail\OrderCompleteEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendOrderCompleteNotification
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
     * @param  OrderCancelled  $event
     * @return void
     */
    public function handle(OrderCancelled $event)
    {
        Mail::to($event->order->user->email)->send(new OrderCompleteEmail($event->order));
    }
}
