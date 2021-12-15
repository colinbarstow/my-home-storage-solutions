<?php

namespace App\Http\Livewire;

use App\Models\OrderPayment;
use Livewire\Component;

class RefundPayment extends Component
{
    public $payment;

    public $complete = false;

    public $confirm = false;

    public function refundConfirm()
    {
        $this->confirm = true;
    }

    public function refund()
    {
        $payment= OrderPayment::find($this->payment->id);
        $user = $payment->order->user;
        $user->refund($payment->stripe_payment_intent_id);
        $payment->update([
            'refunded' => $payment->amount
        ]);
        $this->complete = true;
    }

    public function cancel()
    {
        $this->confirm = false;
    }


    public function render()
    {
        return view('livewire.refund-payment');
    }
}
