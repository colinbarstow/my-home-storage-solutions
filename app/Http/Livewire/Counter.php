<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Counter extends Component
{
    public $cartTotal = '';

    public $cartCount = 0;

    public function mount()
    {
        $cart = Cart::getCart();
        $this->cartCount = $cart->totalItems();
        $this->cartTotal = $cart->subTotalFormattedPrice();
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
