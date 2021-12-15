<?php

namespace App\Listeners;

use App\Events\ContactAdminResponded;
use App\Models\Contact;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendContactAdminRespondedNotification
{


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  ContactAdminResponded  $event
     * @return void
     */
    public function handle(ContactAdminResponded $event)
    {
        Mail::to($event->contact->email)->send(new \App\Mail\ContactAdminResponded($event->response, $event->contact));
    }
}
