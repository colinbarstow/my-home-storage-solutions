<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BillingAddress extends Component
{
    public $hasBillingAddress = false;

    public $billingAddressCompiled = null;

    public $showBillingAddress = false;

    public $showEditBillingAddress = false;

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
        if(Auth::user()->billingAddress()->exists()){
            $this->hasBillingAddress = true;
            $this->showBillingAddress = true;
            $this->billingAddressCompiled = Auth::user()->billingAddress->forRender();
            $this->setEditBillingForm();
        }
    }

    public function setTheAddress()
    {
        $this->billingAddressCompiled = Auth::user()->billingAddress->forRender();
        $this->setEditBillingForm();
    }


    public function setEditBillingForm()
    {
        $billingAddress = Auth::user()->billingAddress;
        $this->firstname = $billingAddress->first_name;
        $this->lastname = $billingAddress->last_name;
        $this->line1 = $billingAddress->first_line;
        $this->line2 = $billingAddress->second_line;
        $this->town = $billingAddress->city;
        $this->county = $billingAddress->county;
        $this->postcode = $billingAddress->postcode;
    }

    public function editBillingAddress()
    {
        $this->showEditBillingAddress = true;
        $this->showBillingAddress = false;
    }

    public function saveBillingAddress()
    {

        if($this->checkIfRequiredFieldsAreComplete()){

            $billingAddress = Auth::user()->billingAddress;
            $billingAddress->first_name = $this->firstname;
            $billingAddress->last_name = $this->lastname;
            $billingAddress->first_line = $this->line1;
            $billingAddress->second_line = $this->line2;
            $billingAddress->city = $this->town;
            $billingAddress->county = $this->county;
            $billingAddress->postcode = $this->postcode;
            $billingAddress->save();
            $this->showEditBillingAddress = false;
            $this->showBillingAddress = true;
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

    public function createBillingAddress()
    {
        if($this->checkIfRequiredFieldsAreComplete()) {
            $billingAddress = new \App\Models\BillingAddress();
            $billingAddress->user_id = Auth::user()->id;
            $billingAddress->first_name = $this->firstname;
            $billingAddress->last_name = $this->lastname;
            $billingAddress->first_line = $this->line1;
            $billingAddress->second_line = $this->line2;
            $billingAddress->city = $this->town;
            $billingAddress->county = $this->county;
            $billingAddress->postcode = $this->postcode;
            $billingAddress->save();
            $this->showEditBillingAddress = false;
            $this->showBillingAddress = true;
            $this->hasBillingAddress = true;
            $this->setTheAddress();
        } else {
            return;
        }
    }

    public function render()
    {
        return view('livewire.billing-address');
    }
}
