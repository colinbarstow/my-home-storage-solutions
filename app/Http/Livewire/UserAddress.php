<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class UserAddress extends Component
{
    public $editAddress = false;

    public $type;

    public $name;

    public $firstname;

    public $lastname;

    public $line1;

    public $line2;

    public $town;

    public $county;

    public $postcode;

    public $message;

    public $showMessage = false;

    public $hasAddress;

    public $address;

    protected  function rules()
    {
        return [
            'firstname' => 'required',
            'lastname'  => 'required',
            'line1'     => 'required',
            'town'      => 'required',
            'county'    => 'required',
            'postcode'  => 'required',
        ];
    }

    public function mount()
    {
        $this->name = Str::title($this->type);
        $this->setAddress();
    }

    public function update()
    {
        $this->setAddress();
    }

    private function setAddress()
    {
        if($this->type == 'billing'){
            if(Auth::user()->billingAddress()->exists()){
                $this->hasAddress = true;
                $this->address = Auth::user()->billingAddress->forRender();
                $this->setAddressVariables(Auth::user()->billingAddress);
            }
        } else {
            if(Auth::user()->shippingAddress()->exists()){
                $this->hasAddress = true;
                $this->address = Auth::user()->shippingAddress->forRender();
                $this->setAddressVariables(Auth::user()->shippingAddress);
            }
        }
    }

    private function setAddressVariables($address)
    {
        $this->firstname = $address->first_name;
        $this->lastname  = $address->last_name;
        $this->line1     = $address->first_line;
        $this->line2     = $address->second_line;
        $this->town      = $address->city;
        $this->county    = $address->county;
        $this->postcode  = $address->postcode;
    }


    public function change()
    {
        $this->editAddress = !$this->editAddress;

    }

    public function submit()
    {
        if($this->type == 'billing'){
            if(Auth::user()->billingAddress()->exists()){
                $this->updateAddress(Auth::user()->billingAddress);
                $this->message = 'Billing Address updated';
            } else {
                $this->createBillingAddress();
                $this->message = 'Billing Address created';
            }
        } else {
            if(Auth::user()->shippingAddress()->exists()){
                $this->updateAddress(Auth::user()->shippingAddress);
                $this->message = 'Shipping Address updated';
            } else {
                $this->createShippingAddress();
                $this->message = 'Shipping Address created';
            }
        }

        $this->showMessage = true;
        $this->change();
        $this->update();
    }

    public function updateAddress($address)
    {
        $address->update([
            'first_name' => $this->firstname,
            'last_name' => $this->lastname,
            'first_line' => $this->line1,
            'second_line' => $this->line2,
            'city' => $this->town,
            'county' => $this->county,
            'postcode' => $this->postcode,
        ]);
    }

    private function createBillingAddress()
    {
        BillingAddress::create([
            'user_id' => Auth::user()->id,
            'first_name' => $this->firstname,
            'last_name' => $this->lastname,
            'first_line' => $this->line1,
            'second_line' => $this->line2,
            'city' => $this->town,
            'county' => $this->county,
            'postcode' => $this->postcode,
        ]);
    }

    private function createShippingAddress()
    {
        \App\Models\ShippingAddress::create([
            'user_id' => Auth::user()->id,
            'first_name' => $this->firstname,
            'last_name' => $this->lastname,
            'first_line' => $this->line1,
            'second_line' => $this->line2,
            'city' => $this->town,
            'county' => $this->county,
            'postcode' => $this->postcode,
        ]);
    }

    public function cancel()
    {
        $this->editAddress = !$this->editAddress;
    }

    public function render()
    {
        return view('livewire.user-address');
    }
}
