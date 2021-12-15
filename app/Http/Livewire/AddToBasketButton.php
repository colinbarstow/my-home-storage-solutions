<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddToBasketButton extends Component
{
    public $qty = 1;

    public $text = 'Add to carty';

    public $productId;

    public $currentQty = 0;

    public function mount(int $productId): void
    {
        $this->productId = $productId;
    }

    public function hydrate(): void
    {
        $this->currentQty = basket()->getCurrentQty($this->productId);
    }

    public function add(): void
    {
        $qty = $this->currentQty + (int) $this->qty;
        if($qty < 1){
            return;
        }

        basket()->add($this->productId, $qty);
        $this->qty = 1;
        $this->text = 'Added';
        $this->emit('basketUpdated');

    }

    public function render()
    {
        return view('livewire.add-to-basket-button');
    }
}
