<?php

namespace App\Http\Livewire;

use App\Events\PaymentReceived;
use App\Models\Order;
use App\Models\OrderPayment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SingleOrderBlock extends Component
{

    public $order;

    public $fullAmount = true;

    public $setAmount = 0;

    public $setAnAmount = false;

    public $min;

    public $max;

    public $completed = false;

    public $amountToPay = '';

    public function mount()
    {
        $this->min = $this->order->minPayable()/100;
        $this->max = $this->order->amountLeft()/100;
        $this->setAmount = $this->min;

        $this->amountToPay = $this->order->formattedAmountLeft();
    }

    public function updatedSetAmount($event)
    {
        if($event < $this->min){
            $this->setAmount = $this->min;
        }

        if($event > $this->max){
            $this->setAmount = $this->max;
        }

        $this->amountToPay = '£' . $event . '.00';
    }

    public function paymentClicked($type)
    {
        if($type === 'set'){
            $this->fullAmount = false;
            $this->amountToPay = '£' . $this->setAmount . '.00';
        } else {
            $this->fullAmount = true;
            $this->amountToPay = $this->order->formattedAmountLeft();
        }

    }

    protected $listeners = [
        'paymentAttempted' => 'charge'
    ];

    public function charge($payLoad)
    {
        $paymentMethod = $payLoad['paymentMethod'];

        if($this->fullAmount === true){
            $payment = $this->max*100;
        } else {
            $payment = $this->setAmount*100;
        }

        $user = Auth::user();

        try {
            $stripeCharge = $user->charge(
                $payment, $paymentMethod
            );



        } catch (\Exception $e) {

            dd($e->getMessage());
        }

        if($stripeCharge->status === 'succeeded'){
            $status = 1;
        } else {
            $status = 2;
        }

        $payment = OrderPayment::create([
            'order_id' => $this->order->id,
            'amount' => $payment,
            'type' => 'increment',
            'status' => $status,
            'stripe_payment_intent_id' => $stripeCharge->id,
            'stripe_payment_method_id' => $stripeCharge->payment_method,
        ]);

        $order = Order::find($this->order->id);

        event(new PaymentReceived($order, $payment));



        if(!$order->paymentIsRequired()){
            if($order->status === 3){
                $order->update([
                    'status' => 2
                ]);
            }
        }



        $this->completed = true;



    }




    public function render()
    {
        return view('livewire.single-order-block');
    }
}
