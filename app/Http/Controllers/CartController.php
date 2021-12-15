<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    public function addItemToCart(Request $request)
    {
        $this->addToCart($request, 'item');
    }

    public function addItemWithAttributesToCart(Request $request)
    {
        $this->addToCart($request, 'attributes', $request->atts);
    }

    public function addToCart($request, $type, $attributes = null)
    {
        $cart = Auth::user()->getCart();
        $product = Product::find($request->product);

        switch($type){
            case 'item':
                $cart->addASingleItem($product, $request->quantity);
                break;
            case 'attributes':
                $cart->addAnItemWithAttributes($product, 1, $attributes);
                break;
        }
    }
}
