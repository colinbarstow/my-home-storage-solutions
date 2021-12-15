<?php

namespace App\Listeners;

use App\Events\ContactCreated;
use App\Mail\ContactEmailAdmin;
use App\Mail\ContactEmailUser;
use App\Models\Contact;
use App\Models\Notification;
use App\Models\SiteConfiguration;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendContactSubmittedNotification
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
     * @param  ContactCreated  $event
     * @return void
     */
    public function handle(ContactCreated $event)
    {
        Mail::to($event->contact->email)->send(new ContactEmailUser($event->contact));
        Mail::to(SiteConfiguration::find(1)->contact_form_email)->send(new ContactEmailAdmin($event->contact));
    }
}
