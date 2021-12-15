<?php

namespace App\Listeners;

use App\Events\PaymentReceived;
use App\Mail\PaymentReceivedEmail;
use Illuminate\Support\Facades\Mail;

class SendPaymentReceivedNotification
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
     * @param  PaymentReceived  $event
     * @return void
     */
    public function handle(PaymentReceived $event)
    {
        Mail::to($event->order->user->email)->send(new PaymentReceivedEmail($event->order, $event->payment));
    }
}
