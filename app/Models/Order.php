<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function notes()
    {
        return $this->hasMany(OrderNote::class);
    }

    public function payments()
    {
        return $this->hasMany(OrderPayment::class);
    }

    public function billingAddress()
    {
        return $this->belongsTo(BillingAddress::class);
    }

    public function shippingAddress()
    {
        return $this->belongsTo(ShippingAddress::class);
    }

    public function hasPayments()
    {
        if($this->payments->count() > 0) return true;
        return false;
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity', 'attributes');
    }

    public function depositHasBeenPaid()
    {
        $deposit = $this->payments()->where('type', 'deposit')->first();
        if($deposit){
            if($deposit->status === 1){
                return true;
            }
            return false;
        }
        return false;
    }

    public function status()
    {
        switch($this->status){
            case 1:
                return 'Order Complete';
                break;
            case 2:
                return 'Full Payment Received';
                break;
            case 3:
                return 'Deposit Received';
                break;
            case 4:
                return 'Order Created';
                break;
            case 5:
                return 'Order Cancelled';
                break;
            case 6:
                return 'Payment failed';
                break;
            case 7:
                return 'Order in creation';
                break;
            case 8:
                return 'Order in build progress';
                break;
            case 9:
                return 'Order rjected';
                break;
        }
    }

    public function formattedSubTotal()
    {
        $subTotal = $this->total - $this->delivery;
        return '£' . int_to_decimal($subTotal);
    }

    public function formattedTotal()
    {
        return '£' . int_to_decimal($this->total);
    }

    public function formattedDelivery()
    {
        return '£' . int_to_decimal($this->delivery) ?? 0;
    }

    public function totalProducts()
    {
        $count = 0;
        foreach($this->products as $product){
            $count = $product->pivot->quantity;
        }
        return $count;
    }

    public function amountPaid()
    {
        $amount = 0;
        foreach($this->payments as $payment){
            if($payment->status !== 2){
                $amount+=$payment->amount;
            }
        }
        return $amount;
    }

    public function formattedAmountPaid()
    {
        return '£'.int_to_decimal($this->amountPaid());
    }

    public function amountLeft()
    {
        return $this->total - $this->amountPaid();
    }

    public function minPayable()
    {
        return ($this->amountLeft()/20);
    }

    public function minimumPayable()
    {
        return '£'.number_format(($this->amountLeft()/20)/100,2);
    }

    public function formattedAmountLeft()
    {
        return '£'.int_to_decimal($this->amountLeft());
    }

    public function paymentIsRequired()
    {
        if($this->notPaidInFull()){

            if($this->status !== 6 && $this->status !== 5){
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function buttons()
    {
        switch($this->status){
            case 1:
                return '<p>Order Complete</p>';
                break;
            case 2:
                return '<p>Full Payment Received</p>';
                break;
            case 3:
                return '<button class="btn btn-primary">Make a Payment</button>';
                break;
            case 4:
                return 'Order Created';
                break;
            case 5:
                return 'Order Cancelled';
                break;
            case 6:
                return 'Payment failed';
                break;
            case 7:
                return 'Order in creation';
                break;
            case 8:
                return 'Order in build progress';
                break;
            case 9:
                return 'Order rejected';
                break;
        }
    }

    private function acceptButton()
    {
        return '<form style="display: inline;" method="POST" action="' . route('admin.order.accept', $this->id) . '">' .
                '<input type="hidden" value="' . csrf_token() . '" name="_token">' .
                '<button style="margin-right:15px" class="btn btn-success"><i class="fa fa-check"></i> Accept Order</button>' .
                '</form>';
    }

    private function completeButton()
    {
        return '<form style="display: inline;" method="POST" action="' . route('admin.order.complete', $this->id) . '">' .
            '<input type="hidden" value="' . csrf_token() . '" name="_token">' .
            '<button style="margin-right:15px" class="btn btn-success"><i class="fa fa-check"></i> Mark as Complete</button>' .
            '</form>';
    }

    private function rejectButton()
    {
        return '<form style="display: inline;" method="POST" action="' . route('admin.order.reject', $this->id) . '">' .
            '<input type="hidden" value="' . csrf_token() . '" name="_token">' .
            '<button style="margin-right:15px" class="btn btn-danger"><i class="fa fa-times"></i> Reject Order</button>' .
            '</form>';
    }

    private function cancelButton()
    {
        return '<a href="' . route('admin.order.cancel', $this->id) . '" style="margin-right:15px" class="btn btn-danger"><i class="fa fa-times"></i> Cancel the order</a>';
    }

    private function refundButton()
    {
        return '<a href="' . route('admin.order.cancel', $this->id) . '" style="margin-right:15px" class="btn btn-danger"><i class="fa fa-times"></i> refund the order</a>';
    }

    private function notesButton()
    {
        return '<a href="#notes" style="margin-right:15px" class="btn btn-warning"><i class="fa fa-clipboard"></i> notes</a>';
    }

    public function adminButtons()
    {
        switch($this->status){
            case 1:
                break;
            case 2:
                return  $this->acceptButton() .
                        $this->rejectButton() .
                        $this->notesButton();
                break;
            case 3:
                return $this->acceptButton() .
                       $this->rejectButton() .
                       $this->notesButton();
                break;
            case 4:
                return 'Order Created';
                break;
            case 5:
                return 'Order Cancelled';
                break;
            case 6:
                return 'Payment failed';
                break;
            case 7:
                return 'Order in creation';
                break;
            case 8:
                return $this->completeButton() .
                    $this->cancelButton();
                break;
        }
    }

    public function notPaidInFull()
    {
        if($this->amountPaid() < $this->total){
            return true;
        } else {
            return false;
        }

    }

    public function promptSentInPast24Hours()
    {
        if($this->promptSent()){
            $now = Carbon::now()->subDay()->format('Y-m-d H:i:s');

            $requestTime = Carbon::parse($this->payment_request)->format('Y-m-d H:i:s');

            if($now < $requestTime){
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }

    }

    public function promptSent()
    {
        if($this->payment_request !== null){
            return true;
        } else {
            return false;
        }
    }

}
