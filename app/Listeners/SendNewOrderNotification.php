<?php

namespace App\Listeners;

use App\Events\NewOrder;
use App\Mail\NewOrderAdminEmail;
use App\Mail\NewOrderEmail;
use Illuminate\Support\Facades\Mail;

class SendNewOrderNotification
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
     * @param  NewOrder  $event
     * @return void
     */
    public function handle(NewOrder $event)
    {
        Mail::to($event->order->user->email)->send(new NewOrderEmail($event->order));
        Mail::to('orders@myhomestoragesolutions.com')->send(new NewOrderAdminEmail($event->order));
    }
}
