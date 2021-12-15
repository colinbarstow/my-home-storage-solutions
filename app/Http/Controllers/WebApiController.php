<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebApiController extends Controller
{
    public function getDefaultBillingAddress()
    {
        return Auth::user()->defaultBillingAddress();
    }

    public function getAlternativeBillingAddresses()
    {
        return Auth::user()->allOtherBillingAddresses();
    }

    public function getDefaultShippingAddress()
    {
        return Auth::user()->defaultShippingAddress();
    }

    public function getAlternativeShippingAddresses()
    {
        return Auth::user()->allOtherShippingAddresses();
    }
}
