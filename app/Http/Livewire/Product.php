<?php

namespace App\Http\Livewire;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Product extends Component
{
    public $product;

    public $text = 'Add to Cart';

    public $cartInstance = [];

    public $quantity = 1;

    public $currentQty = 0;

    public $attribs;

    public $atts = [];

    public $error = null;

    public function mount():void
    {
        $this->cartInstance = basket()->get($this->product->id);


        foreach($this->attribs as $attib){
            $this->atts[$attib->titleToLower()] = '';
            if(!empty($this->cartInstance['attributes'])){
                foreach($this->cartInstance['attributes'] as $atty){
                    if(array_key_exists($attib->titleToLower(), $atty)){
                        $this->atts[$attib->titleToLower()] = $atty[$attib->titleToLower()];
                    }
                }
            }
        }


        $this->currentQty = basket()->getCurrentQty($this->product->id);

    }


    public function addToBasket()
    {
        $attribs = [];

        foreach($this->attribs as $attib) {

            if($this->atts[$attib->titleToLower()] !== ''){

                array_push($attribs, [$attib->titleToLower() => $this->atts[$attib->titleToLower()]]);

                $this->error = null;

            } else {

                $this->error .= 'You have not filled out the ' . $attib->titleToLower() . ' field ';

                return;

            }

        }

        $qty = $this->currentQty + (int) $this->quantity;

        if($qty < 1){

            return;

        }

        basket()->add($this->product->id, $this->quantity, $attribs);

        $this->qty = 1;

        $this->text = 'Added';

        foreach($this->attribs as $attib) {

            $this->atts[$attib->titleToLower()] = '';

        }

        $this->emit('basketUpdated');

        $this->dispatchBrowserEvent('added-to-basket', ['product' => $this->product->id]);

    }

    public function changeButtonText()
    {


        sleep(5);

//        $this->text = 'Add to cart';
    }

    public function increase()
    {
        $this->quantity+=1;
    }

    public function decrease()
    {
        if($this->quantity> 1){
            $this->quantity-=1;
        }
    }

    public function render()
    {
        return view('livewire.product');
    }
}
