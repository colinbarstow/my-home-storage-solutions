<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPayment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function status()
    {
        switch($this->status){
            case 1:
                return 'Payment Complete';
                break;
            case 2:
                return 'Payment Failed';
                break;
            case 3:
                return 'Payment Refunded';
                break;
        }
    }

    public function formattedAmount()
    {
        return '£' . int_to_decimal($this->amount);
    }
}
