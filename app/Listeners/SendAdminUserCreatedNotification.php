<?php

namespace App\Listeners;

use App\Events\AdminUserCreated;
use App\Mail\AdminUserCreatedEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendAdminUserCreatedNotification
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
     * @param  AdminUserCreated  $event
     * @return void
     */
    public function handle(AdminUserCreated $event)
    {
        Mail::to($event->user->email)->send(new AdminUserCreatedEmail($event->user, $event->password));
    }
}
