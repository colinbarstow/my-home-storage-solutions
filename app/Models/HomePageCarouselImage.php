<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePageCarouselImage extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function page()
    {
        return $this->belongsTo(HomePage::class);
    }
    public function status()
    {
        if($this->active) return 'Currently Active';
        return 'Currently Not Active';
    }
}
