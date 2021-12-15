<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Card extends Component
{
    public $paymentmethod;
    public $error;

    public function render()
    {
        return view('livewire.card');
    }
}
