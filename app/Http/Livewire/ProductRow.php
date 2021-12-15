<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class ProductRow extends Component
{

    public $product;

    public $order;

    public $quantity;

    public $showRemoveBlock = false;
    public $showRefundBlock = false;
    public $showChangeAttBlock = false;

    public function mount()
    {
        $this->quantity = $this->product->pivot->quantity;
    }

    public function removeItem()
    {
        $this->showChangeAttBlock = false;
        $this->showRefundBlock = false;
        $this->showRemoveBlock = true;
    }

    public function removeAll()
    {

        $order = Order::find($this->order->id);
        $product = \App\Models\Product::find($this->product->id);
        $order->products()->detach($product);

        if(!$order->products->count() > 0){

            $order->update([
                'status' => 5
            ]);

            //event
        }

        $this->showRemoveBlock = true;
    }

    public function refund()
    {
        $this->showChangeAttBlock = false;
        $this->showRefundBlock = true;
        $this->showRemoveBlock = false;
    }

    public function changeAtt()
    {
        $this->showChangeAttBlock = true;
        $this->showRefundBlock = false;
        $this->showRemoveBlock = false;
    }


    public function render()
    {
        return view('livewire.product-row');
    }
}
