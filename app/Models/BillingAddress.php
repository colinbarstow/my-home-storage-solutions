<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingAddress extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function compiled()
    {
        return $this->first_line . ', ' . $this->city . ', ' . $this->county . ', ' . $this->postcode;
    }

    public function forRender()
    {
        if($this->second_line !== null){

            $second_line = "{$this->second_line}";

        } else {

            $second_line = '';

        }

        if($this->third_line !== null){

            $third_line = "{$this->third_line}";

        } else {

            $third_line = '';

        }

        return "<p>{$this->first_name} {$this->last_name}<br>" .

                "{$this->first_line}<br>" .
                "{$second_line}" .
                "{$third_line}" .
                "{$this->city}<br>" .
                "{$this->county}<br>" .
                "{$this->postcode}</p>";
    }

    public function canBeDeleted()
    {
        if($this->orders()->exists()) return false;
        return true;
    }
}
