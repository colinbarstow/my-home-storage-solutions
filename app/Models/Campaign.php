<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'scheduled' => 'datetime',
        'posted' => 'boolean'
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    public function marketingLists()
    {
        return $this->belongsToMany(MarketingList::class, 'campaign_marketing_list');
    }

    public function status()
    {

        if($this->posted){
            return 'campaign has been sent';
        } else {
            return 'campaign is queued';
        }
    }

    public function canBeEdited()
    {
        if($this->posted){
            return false;
        } else {
            return true;
        }
    }

    public function canBeDeleted()
    {
        if($this->posted){
            return false;
        } else {
            return true;
        }
    }
}
