<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogFacebook extends Model
{
    use HasFactory;

    protected $fillable = ['blog_id', 'scheduled_time', 'posted', 'url'];

    protected $casts = [
        'posted' => 'boolean',
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    public function currentLikes()
    {
        return 11;
    }

    public function currentComments()
    {
        return 6;
    }
}
