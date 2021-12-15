<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity', 'atts');
    }

    public function addASingleItemToTheCart($product, $quantity)
    {
        if($this->products()->where('products.id', $product->id)->exists()){
            $this->products()->updateExistingPivot($product, [
                'quantity' => $quantity
            ]);
        } else {
            $this->products()->attach($product, ['quantity' => $quantity]);
        }
    }

    public function addAnItemWithAttributes($product, $quantity, $attributes)
    {
        if($this->products()->where('products.id', $product->id)->exists()){
            $this->products()->updateExistingPivot($product, [
                'quantity' => $quantity,
            ]);
        } else {
            $this->products()->attach($product, ['quantity' => 1, 'atts' => json_encode($attributes)]);
        }
    }

    public function totalItems()
    {
        $count = 0;
        foreach($this->products as $product){
            $count+=(1*$product->pivot->quantity);
        }
        return $count;
    }

    public function subTotalFormattedPrice()
    {
        $count = 0;
        foreach($this->products as $product){
            $count+=($product->price*$product->pivot->quantity);
        }
        return '£' . number_format($count/100,2);
    }

    //Cart
    public static function getCart()
    {
        if($this->checkIfCartIsInSession()) return $this->retrieveCartFromSession();
        return $this->createCart();
    }
}
