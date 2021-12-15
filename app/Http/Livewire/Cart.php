<?php

namespace App\Http\Livewire;

use App\Models\County;
use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Cart extends Component
{
    public $basket = [];

    public $products = [];

    public $totalFormatted = 0.00;

    public $total = 0.00;

    public $subTotalFormatted = 0.00;

    public $subTotal = 0.00;

    public $delivery = 0;

    public $deliveryFormatted = 0.00;

    public $qty = 0;

    public $town;

    public $townError = null;

    public $postcode;

    public $postcodeError = null;

    public $county;

    public $countyError = null;


    protected $listeners = [
        'basketUpdated' => 'hydrate',
        'toggleBasket' => 'toggle'
    ];

    public function mount(): void
    {
        if(session()->get('county')){
            $this->county = session()->get('county');
            $county = County::find(session()->get('county'));
            $this->delivery = $county->price;
            $this->deliveryFormatted = int_to_decimal($county->price);
        }
        if(session()->get('town')){
            $this->town = session()->get('town');
        }
        if(session()->get('postcode')){
            $this->postcode = session()->get('postcode');
        }
        $this->hydrate();
    }

    public function hydrate(): void
    {
        $this->basket = basket()->all();

        $this->qty = array_sum(array_column($this->basket, 'qty'));

        $this->products = tap(
            $this->products(),
            fn(Collection $products) => $this->subTotal = $products->sum('total_raw')
        )->toArray();

        $this->totalFormatted = int_to_decimal($this->subTotal + $this->delivery);
        $this->subTotalFormatted = int_to_decimal($this->subTotal);
    }

    public function county($value)
    {
        $county = County::find($value);
        basket()->addCounty($county->id);
        $this->delivery = $county->price;
        $this->deliveryFormatted = int_to_decimal($county->price);
        $this->update();
    }

    private function products(): Collection
    {
        if(empty($this->basket)) {
            return new Collection;
        }

        return Product::whereIn('id', array_keys($this->basket))
            ->get()
            ->map(function (Product $product) {
                return (object)[
                    'id' => $product->id,
                    'title' => $product->title,
                    'slug' => $product->slug,
                    'image' => Storage::url($product->mainImage()->image),
                    'price' => $price = $product->priceToUse(),
                    'formatted_price' => int_to_decimal($price),
                    'qty' => $qty = $this->basket[$product->id]['qty'],
                    'total_raw' => $total = $price * $qty,
                    'total' => int_to_decimal($total),
                    'attributes' => $this->basket[$product->id]['attributes']
                ];
            });
    }

    public function remove(int $id): void
    {
        basket()->remove($id);
        $this->update();
    }

    public function increase(int $id): void
    {
        $atts = $this->basket[$id]['attributes'];
        basket()->add($id, $this->basket[$id]['qty'] + 1, $atts);
        $this->update();
    }

    public function decrease(int $id)
    {
        if(($qty = $this->basket[$id]['qty'] -1) < 1){
            $this->remove($id);
        } else {
            $atts = $this->basket[$id]['attributes'];
            basket()->add($id, $qty, $atts);
        }
        $this->update();
    }

    private function update(): void
    {
        $this->emit('basketUpdated');
    }

    public function proceedToCheckout()
    {
        return redirect()->route('checkout');
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
