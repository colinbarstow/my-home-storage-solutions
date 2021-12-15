<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminProfile extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'email' => 'boolean',
        'sms' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function telephone()
    {
        if($this->telephone_number !== null){
            return $this->telephone_number;
        } else {
            return 'Not provided';
        }
    }

    public function location()
    {
        if($this->location !== null){
            return $this->location;
        } else {
            return 'Not provided';
        }
    }
}
