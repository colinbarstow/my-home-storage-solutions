<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'active' => 'boolean',
        'featured' => 'boolean'
    ];

    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function mainImage()
    {
        return $this->images()->where('main', true)->first();
    }

    public function altImages()
    {
        return $this->images()->where('main', false)->get();
    }

    public function shipping()
    {
        return $this->belongsTo(Shipping::class);
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function status()
    {
        if($this->active){
            return 'Active';
        } else {
            return 'Not Active';
        }
    }

    public function featured()
    {
        if($this->featured){
            return 'Active';
        } else {
            return 'Not Active';
        }
    }

    public function formattedPrice()
    {
        return '£' . number_format($this->price/100, 2);
    }

    public function formattedSalePrice()
    {
        return '£' . number_format($this->sale_price/100, 2);
    }

    public function formatted_price()
    {
        return number_format($this->price/100, 2);
    }

    public static function bestSellers()
    {
        $orders = Order::all();

        if($orders->count() > 0){
            return Product::query()
                ->has('images')
                ->join('order_product', 'order_product.product_id', '=', 'products.id')
                ->selectRaw('products.*, SUM(order_product.quantity) AS quantity_sold')
                ->groupBy(['products.id'])
                ->orderByDesc('quantity_sold')
                ->take(4)
                ->get();
        } else {

            return Product::orderBy('price', 'desc')
                ->has('images')
                ->with('images')
                ->get()
                ->take(2);

        }

    }

    public static function featuredItems()
    {

        return Product::where('featured', true)
            ->has('images')
            ->inRandomOrder()
            ->with('images')
            ->get()
            ->take(4);
    }

    public function isNew()
    {
        $now = Carbon::now();
        $cutoffForNew = $now->subDays(10)->format('Y-m-d');
        $created = Carbon::parse($this->created_at)->format('Y-m-d');
        if($created > $cutoffForNew) return true;
        return false;
    }

    public function isOnSale()
    {
        if($this->sale_price !== null) return true;
        return false;
    }

    public function salePercentage()
    {
        $originalPrice = $this->price;
        $salePrice = $this->sale_price;
        $differenceBetweenPrices = $originalPrice-$salePrice;
        return number_format(($differenceBetweenPrices/$originalPrice)*100, 2) . '%';
    }

    public function averageRating()
    {
        $reviews = $this->reviews;
        if($reviews->count() < 1) return 0;
        $count = 0;
        $potentialTotal = $reviews->count() * 5;
        foreach($reviews as $review){
            $count += $review->star_count;
        }
        return($count/$potentialTotal)*100;
    }

    public function isComplete()
    {
        if($this->images->count() > 0) return true;
        return false;
    }

    public function priceToUse()
    {
        if($this->sale_price !== null) return $this->sale_price;
        return $this->price;
    }

    public function canBeDeleted()
    {
        if($this->orders->count() > 0){
            return false;
        } else {
            return true;
        }
    }

    public function onSale()
    {
        if($this->sale_price !== null){
            return 'Yes';
        } else {
            return 'No';
        }
    }

    public static function latestSix()
    {
        $now = Carbon::now();

        $cutoffForNew = $now->subDays(10)->format('Y-m-d H:i:s');

        return Product::where('created_at', '>', $cutoffForNew)
            ->where('active', true)
            ->has('images')
            ->orderBy('id', 'desc')
            ->take(6)
            ->get();
    }

}
