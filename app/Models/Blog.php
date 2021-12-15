<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'active', 'featured', 'written_by', 'last_edited_by', 'image', 'slug', 'blog_category_id'];

    protected $casts = [
        'active' => 'boolean',
        'featured' => 'boolean',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'written_by');
    }

    public function authorName()
    {
        $details = SiteConfiguration::find(1);
        if($this->author) return $this->author->fullName();
        return $details->website_name;
    }

    public function recentEditor()
    {
        return $this->belongsTo(User::class, 'last_edited_by');
    }

    public function facebookPost()
    {
        return $this->hasOne(BlogFacebook::class);
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

    public function postedToFacebookStatus()
    {
        if($this->facebookPost){
            if($this->facebookPost->posted){
                return "Posted to Facebook at " . Carbon::parse($this->facebookPost->scheduled_time)->format('d m Y H:i:s');
            } else {
                return "Scheduled To Post on Facebook at " . Carbon::parse($this->facebookPost->scheduled_time)->format('d m Y H:i:s');
            }
        } else {
            return 'Not Posted To Facebook';
        }
    }

    public function monthlyViews()
    {
        $created = Carbon::parse($this->created_at);
        $now = Carbon::now();
        $diff = $now->diffInMonths($created);

        if($diff > 0){
            $months = $diff;
        } else {
            $months = 1;
        }

        return round($this->views/$months);
    }

    public function currentScore()
    {
        $created = Carbon::parse($this->created_at);
        $now = Carbon::now();
        $diff = $now->diffInDays($created);

        if($diff > 0){
            $days = $diff;
        } else {
            $days = 1;
        }

        return round($this->views/$days) . ' views per day';
    }


    public function deletionImpact()
    {
        if($this->currentScore() > 1) return 'negatively';
        return 'not';
    }

    public static function mostPopularTwo()
    {
        return Blog::orderBy('views', 'desc')->get()->take(2);
    }

    public function campaign()
    {
        return $this->hasOne(Campaign::class);
    }

    public function hasCampaign()
    {
        if($this->campaign()->exists()) return true;
        return false;
    }

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }

    public function comments()
    {
        return $this->hasMany(BlogComment::class);
    }

    public static function popularPosts($count)
    {
        return Blog::where('active', true)
            ->orderBy('views', 'desc')
            ->take($count)
            ->get();
    }

}
