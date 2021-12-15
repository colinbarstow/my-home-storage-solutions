<?php

namespace App\Http\Livewire;

use App\Models\County;
use Livewire\Component;

class Delivery extends Component
{
    public $deliveryPrice = 0;

    public $deliveryPriceFormatted = 0.00;

    public $countyName;

    protected $listeners = ['updatedAddress' => 'updateCounty'];

    public function mount()
    {
        $this->gotCounty();
    }

    public function updateCounty($county)
    {
        $this->countyName = $county;
        $this->gotCounty();
    }

    public function gotCounty()
    {
        $countyNameFormatted = ucfirst($this->countyName);

        $county = County::where('name', $countyNameFormatted)->first();

        if($county){

            $this->deliveryPrice = $county->price;

            $this->deliveryPriceFormatted = int_to_decimal($county->price);

        } else {

            $this->deliveryPrice = 10000;

            $this->deliveryPriceFormatted = int_to_decimal(10000);

        }

    }

    public function render()
    {
        return view('livewire.delivery');
    }
}
