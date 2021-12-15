<?php

namespace App\Http\Livewire;

use App\Models\Shipping;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShippingAddress extends Component
{
    public $hasShippingAddress = false;

    public $shippingAddressCompiled = null;

    public $showShippingAddress = false;

    public $showEditShippingAddress = false;

    public $firstname = null;
    public $firstnameError = null;

    public $lastname = null;
    public $lastnameError = null;

    public $line1 = null;
    public $line1Error = null;

    public $line2 = null;

    public $town = null;
    public $townError = null;

    public $county = null;
    public $countyError = null;

    public $postcode = null;
    public $postcodeError = null;

    public function mount():void
    {
        if(Auth::user()->shippingAddress()->exists()){
            $this->hasShippingAddress = true;
            $this->showShippingAddress = true;
            $this->shippingAddressCompiled = Auth::user()->shippingAddress->forRender();
            $this->setEditShippingForm();
        }
    }

    public function setTheAddress()
    {
        $this->shippingAddressCompiled = Auth::user()->shippingAddress->forRender();
        $this->setEditShippingForm();
    }

    public function setEditShippingForm()
    {
        $shippingAddress = Auth::user()->shippingAddress;
        $this->firstname = $shippingAddress->first_name;
        $this->lastname = $shippingAddress->last_name;
        $this->line1 = $shippingAddress->first_line;
        $this->line2 = $shippingAddress->second_line;
        $this->town = $shippingAddress->city;
        $this->county = $shippingAddress->county;
        $this->postcode = $shippingAddress->postcode;
    }

    public function editShippingAddress()
    {
        $this->showEditShippingAddress = true;
        $this->showShippingAddress = false;
    }

    public function saveShippingAddress()
    {
        if($this->checkIfRequiredFieldsAreComplete()) {
            $shippingAddress = Auth::user()->shippingAddress;
            $shippingAddress->first_name = $this->firstname;
            $shippingAddress->last_name = $this->lastname;
            $shippingAddress->first_line = $this->line1;
            $shippingAddress->second_line = $this->line2;
            $shippingAddress->city = $this->town;
            $shippingAddress->county = $this->county;
            $shippingAddress->postcode = $this->postcode;
            $shippingAddress->save();
            $this->showEditShippingAddress = false;
            $this->showShippingAddress = true;
            $this->emit('updatedAddress', $this->county);
            $this->setTheAddress();
        } else {
            return;
        }

    }

    public function checkIfRequiredFieldsAreComplete()
    {

        if($this->firstname === null || $this->firstname === ''){
            $this->firstnameError = 'You have not entered first name for your billing address';
            return false;
        } else {
            $this->firstnameError = null;
        }

        if($this->lastname === null || $this->lastname === ''){
            $this->lastnameError = 'You have not entered last name for your billing address';
            return false;
        } else {
            $this->lastnameError = null;
        }

        if($this->line1 === null || $this->line1 === ''){
            $this->line1Error = 'You have not entered a first line for your billing address';
            return false;
        } else {
            $this->line1Error = null;
        }

        if($this->town === null || $this->town === ''){
            $this->townError = 'You have not entered a town for your billing address';
            return false;
        } else {
            $this->townError = null;
        }

        if($this->county === null || $this->county === ''){
            $this->countyError = 'You have not entered a county for your billing address';
            return false;
        } else {
            $this->countyError = null;
        }

        if($this->postcode === null || $this->postcode === ''){
            $this->postcodeError = 'You have not entered a postcode for your billing address';
            return false;
        } else {
            $this->postcodeError = null;
        }

        return true;
    }

    public function createShippingAddress()
    {
        if($this->checkIfRequiredFieldsAreComplete()) {
            $shippingAddress = new \App\Models\ShippingAddress();
            $shippingAddress->user_id = Auth::user()->id;
            $shippingAddress->first_name = $this->firstname;
            $shippingAddress->last_name = $this->lastname;
            $shippingAddress->first_line = $this->line1;
            $shippingAddress->second_line = $this->line2;
            $shippingAddress->city = $this->town;
            $shippingAddress->county = $this->county;
            $shippingAddress->postcode = $this->postcode;
            $shippingAddress->save();
            $this->showEditShippingAddress = false;
            $this->showShippingAddress = true;
            $this->hasShippingAddress = true;
            $this->emit('updatedAddress', $this->county);
            $this->setTheAddress();
        } else {
            return;
        }

    }

    public function render()
    {
        return view('livewire.shipping-address');
    }
}
