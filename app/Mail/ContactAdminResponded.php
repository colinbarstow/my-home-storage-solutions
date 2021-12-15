<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactAdminResponded extends Mailable
{
    use Queueable, SerializesModels;

    public $response;

    public $contact;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Contact $response, Contact $contact)
    {
        $this->response = $response;
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Response to your query')
            ->from('noreply@myhomestoragesolutions.com', config('app.name'))
            ->markdown('emails.contact.admin-responded');
    }
}
