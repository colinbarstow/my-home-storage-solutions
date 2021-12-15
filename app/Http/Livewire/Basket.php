<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Basket extends Component
{
    public $visible = false;

    public $basket = [];

    public $products = [];

    public $total = 0.00;

    public $subTotal = 0.00;

    public $subTotalFormatted = 0.00;

    public $qty = 0;

    public $styling = null;

    protected $listeners = [
        'basketUpdated' => 'hydrate',
        'toggleBasket' => 'toggle'
    ];

    public function mount(): void
    {
        $this->basket = basket()->all();

        $this->qty = array_sum(array_column(basket()->all(), 'qty'));

        $this->products = tap(
            $this->products(),
            fn(Collection $products) => $this->subTotal = $products->sum('total_raw')
        )->toArray();

        $this->subTotalFormatted = int_to_decimal($this->subTotal);

        $this->styling = null;
    }

    public function hydrate(): void
    {
        $this->basket = basket()->all();

        $this->qty = array_sum(array_column(basket()->all(), 'qty'));

        $this->products = tap(
            $this->products(),
            fn(Collection $products) => $this->subTotal = $products->sum('total_raw')
        )->toArray();

        $this->subTotalFormatted = int_to_decimal($this->subTotal);

        $this->styling = 'visibility: visible; opacity: 1; top: calc(100% - 20px);transform: translate3d(0, 0, 0)';

        $this->dispatchBrowserEvent('showing-basket');

    }

    public function hideBasket()
    {
        sleep(7);
        $this->styling = null;
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
                    'price' => $price = $product->sale_price ? $product->sale_price : $product->price,
                    'formatted_price' => int_to_decimal($price),
                    'qty' => $qty = $this->basket[$product->id]['qty'],
                    'total_raw' => $total = $price * $qty,
                    'total' => int_to_decimal($total),
                    'attributes' => $this->basket[$product->id]['attributes']
                ];
            });
    }

    public function toggle(): void
    {
        $this->visible = !$this->visible;
    }

    public function remove(int $id): void
    {
        basket()->remove($id);
        $this->update();
    }

    private function update(): void
    {
        $this->emit('basketUpdated');
    }

    public function render()
    {
        return view('livewire.basket');
    }
}
