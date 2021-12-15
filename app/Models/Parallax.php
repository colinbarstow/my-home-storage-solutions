<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parallax extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'active' => 'boolean'
    ];

    public function page()
    {
        return $this->belongsTo(HomePage::class, 'home_page_id');
    }

    public function status()
    {
        if($this->active) return 'Active';
        return 'Not Active';
    }
}
