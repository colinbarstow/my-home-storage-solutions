<?php

namespace App\Listeners;

use App\Events\NewUserRegistered;
use App\Mail\AdminUserCreatedEmail;
use App\Mail\UserRegisteredEmail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendUserRegisteredNotification
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
     * @param  object  $event
     * @return void
     */
    public function handle(NewUserRegistered $event)
    {
        Mail::to('colinbarstow@gmail.com')->send(new UserRegisteredEmail($event->user, $event->password));
    }
}
