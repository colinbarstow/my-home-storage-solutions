<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminUserCreatedEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@myhomestoragesolutions.com', 'My Home Storage Solutions')
            ->subject('Your ' . config('app.name') . ' account')
            ->markdown('emails.admin.users.created');
    }
}
