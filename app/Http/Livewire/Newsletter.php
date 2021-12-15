<?php

namespace App\Http\Livewire;

use App\Mail\NewsLetterSubscribed;
use App\Models\MarketingList;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Newsletter extends Component
{
    public $email;

    public $complete = false;

    public $finishMessage;

    protected function rules()
    {
        return [
            'email' => 'required|email',
        ];
    }

    public function submit()
    {
        $this->validate();

        $check = MarketingList::where('email', $this->email)->first();

        if(!$check){

            MarketingList::create([
                'email' => $this->email
            ]);

            Mail::to($this->email)->send(new NewsLetterSubscribed());

            $this->finishMessage = 'You have successfully subscribed to our newsletter';

        } else {

            $this->finishMessage = 'You are already subscribed to our newsletter';

        }

        $this->complete = true;

    }

    public function render()
    {
        return view('livewire.newsletter');
    }
}
