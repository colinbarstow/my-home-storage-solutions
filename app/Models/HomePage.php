<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function carouselImages()
    {
        return $this->hasMany(HomePageCarouselImage::class);
    }

    public function parallaxes()
    {
        return $this->hasMany(Parallax::class);
    }

    public function hasActiveParallax()
    {
        if($this->parallaxes()->where('active', true)->first()) return true;
        return false;
    }

    public function activeParallax()
    {
        if($parallax = $this->parallaxes()->where('active', true)->first()) return $parallax;
        return null;
    }
}
