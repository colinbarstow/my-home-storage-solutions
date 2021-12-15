<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'active' => 'boolean',
        'featured' => 'boolean'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
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
            return 'Featured';
        } else {
            return 'Not Featured';
        }
    }

    public function canBeDeleted()
    {
        if($this->products->count() > 0){
            return false;
        } else {
            return true;
        }
    }
}
