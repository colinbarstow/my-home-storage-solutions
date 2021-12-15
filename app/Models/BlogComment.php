<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function name()
    {
        if($this->user()->exists()){
            return $this->user->fullName();
        } else {
            return $this->name;
        }
    }

    public function date()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }
}
