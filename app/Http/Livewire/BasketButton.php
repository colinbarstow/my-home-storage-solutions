<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BasketButton extends Component
{

    public $qty = 0;

    protected $listeners = ['basketUpdated' => 'update'];

    public function mount():void
    {
        $this->update();
    }

    public function update():void
    {
        $this->qty = array_sum(array_column(basket()->all(), 'qty'));
    }

    public function toggle(): void
    {
        $this->emit('toggleBasket');
    }

    public function render()
    {
        return view('livewire.basket-button');
    }

}
