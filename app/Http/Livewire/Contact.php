<?php

namespace App\Http\Livewire;

use App\Events\ContactCreated;
use App\Models\Notification;
use App\Models\Order;
use Livewire\Component;

class Contact extends Component
{
    public $name;

    public $email;

    public $message;

    public $complete = false;

    protected function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ];
    }

    public function submit()
    {
        $this->validate();

        $contact = \App\Models\Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ]);

        Notification::makeNew(\App\Models\Contact::class, $contact);

        $this->emit('newNotification');

        event(new ContactCreated($contact));

        $this->complete = true;
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
