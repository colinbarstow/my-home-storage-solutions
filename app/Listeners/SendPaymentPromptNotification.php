<?php

namespace App\Listeners;

use App\Events\NewOrder;
use App\Events\PaymentPrompt;
use App\Events\PaymentReceived;
use App\Mail\NewOrderAdminEmail;
use App\Mail\NewOrderEmail;
use App\Mail\PaymentPromptEmail;
use App\Mail\PaymentReceivedEmail;
use Illuminate\Support\Facades\Mail;

class SendPaymentPromptNotification
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
     * @param  PaymentPrompt  $event
     * @return void
     */
    public function handle(PaymentPrompt $event)
    {
        Mail::to($event->order->user->email)->send(new PaymentPromptEmail($event->order));
    }
}
