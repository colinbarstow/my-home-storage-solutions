<?php

namespace App\Mail;

use App\Models\Order;
use App\Models\OrderPayment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentReceivedEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $payment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order, OrderPayment $payment)
    {
        $this->order = $order;
        $this->payment = $payment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Payment Received')
            ->from('noreply@myhomestoragesolutioons', config('app.name'))
            ->markdown('emails.users.orders.payment');
    }
}
