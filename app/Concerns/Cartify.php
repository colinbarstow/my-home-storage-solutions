<?php

namespace App\Concerns;


use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

trait Cartify
{
    public function checkIfCartIsInSession()
    {
        if(Session::get('cart_id')){
            return true;
        } else {
            return false;
        }
    }

    public function retrieveCartFromSession()
    {
        $cart_id = Session::get('cart_id');
        return Cart::find(intval($cart_id));
    }

    public function createCart()
    {
        $cart = Cart::create();
        if(Auth::user()) $cart->user_id = Auth::user()->id;
        $cart->save();
        $this->storeCartInSession($cart);
        return $cart;
    }

    public function storeCartInSession($cart)
    {
        Session::put('cart_id', $cart->id);
    }

}
