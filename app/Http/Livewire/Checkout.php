<?php

namespace App\Http\Livewire;

use App\Events\NewOrder;
use App\Models\BillingAddress;
use App\Models\County;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderPayment;
use App\Models\Product;
use App\Models\ShippingAddress;
use App\Models\SiteConfiguration;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Checkout extends Component
{
    public $basket = [];

    public $products = [];

    public $totalFormatted = 0.00;

    public $total = 0;

    public $deposit = 0;

    public $depositPercentage = 0;

    public $remaining = 0;

    public $depositFormatted = 0.00;

    public $remainingFormatted = 0.00;

    public $subTotalFormatted = 0.00;

    public $subTotal = 0.00;

    public $qty = 0;

    public $notes = null;

    public $billingAddressId = null;

    public $shippingAddressId = null;

    public $payment = null;

    public $showDepositMessage = false;

    public $paymentError =null;

    public $showUsersAddresses = false;

    public $showUsersShippingAddresses = false;

    public $showAddBilling = false;

    public $showAddShipping = false;

    public $showAddBillingButton = true;

    public $showAddShippingButton = true;

    public $showCancelAddingBillingButton = false;

    public $showCancelAddingShippingButton = false;

    public $saveBillingAddress = false;

    public $saveShippingAddress = false;

    public $shipToSame = true;

    public $delivery = 0;

    public $deliveryFormatted = 0.00;

    public $shippingAddressP = null;

    public $loading = false;


    protected $listeners = [
        'basketUpdated' => 'hydrate',
        'toggleBasket' => 'toggle',
        'paymentMethodCreated' => 'complete',
        'deliveryAdded' => 'setDelivery'
    ];

    public function mount(): void
    {
        if(Auth::user()->shippingAddress()->exists()){
            $this->shippingAddressP = Auth::user()->shippingAddress;
            $this->setDelivery($this->shippingAddressP);
        }
        $this->hydrate();

        $siteConfig = SiteConfiguration::find(1);
        $this->depositPercentage = $siteConfig->deposit;
    }


    public function hydrate(): void
    {

        $this->basket = basket()->all();

        $this->qty = array_sum(array_column($this->basket, 'qty'));

        $this->products = tap(
            $this->products(),
            fn(Collection $products) => $this->subTotal = $products->sum('total_raw')
        )->toArray();

        $this->totalFormatted = int_to_decimal($this->subTotal + $this->delivery);
        $this->subTotalFormatted = int_to_decimal($this->subTotal);

        $siteConfig = SiteConfiguration::find(1);
        $this->depositPercentage = $siteConfig->deposit;

        $this->total = $this->subTotal + $this->delivery;
        $this->deposit = (($this->subTotal + $this->delivery)/100)*$this->depositPercentage;
        $this->depositFormatted = int_to_decimal((($this->subTotal + $this->delivery)/100)*$this->depositPercentage);

        $this->remaining = $this->total-$this->deposit;
        $this->remainingFormatted = int_to_decimal($this->remaining);

    }

    public function setDelivery($delivery)
    {
        $countyName = $delivery->county;
        $countyNameFormatted = ucfirst($countyName);

        $county = County::where('name', $countyNameFormatted)->first();

        if($county){

            $this->delivery = $county->price;

            $this->deliveryFormatted = int_to_decimal($county->price);

        } else {

            $this->delivery = 10000;

            $this->deliveryFormatted = int_to_decimal(10000);

        }
    }

    private function buildOrder($user, $billingAddress, $shippingAddress)
    {
        return Order::create([
            'user_id' => $user->id,
            'billing_address_id' => $billingAddress->id,
            'shipping_address_id' => $shippingAddress->id,
            'status' => 4,
            'deposit' => $this->deposit,
            'total' => $this->total,
            'delivery' => $this->delivery,
        ]);
    }

    public function complete($payLoad)
    {
        $this->loading = true;

        $user = Auth::user();

        $paymentMethod = $payLoad['paymentMethod'];

        $billingAddress = Auth::user()->billingAddress;
        if($billingAddress == null){
            $this->paymentError = 'You have not entered or saved your billing address';
            $this->loading = false;
            return;
        }

        $shippingAddress = Auth::user()->shippingAddress;
        if($shippingAddress == null){
            $this->paymentError = 'You have not entered or saved your shipping address';
            $this->loading = false;
            return;
        }

        $order = $this->buildOrder($user, $billingAddress, $shippingAddress);

        foreach($this->basket as $key => $p){
            $product = Product::find($key);
            $order->products()->attach($product, [
                'quantity' => $p['qty'],
                'attributes' => json_encode($p['attributes'])
            ]);
            basket()->remove($key);
        }

        //charge order
        if($this->payment === 'deposit'){
            try {
                $stripeCharge = $user->charge(
                    $this->deposit, $paymentMethod
                );
                $this->createCharge($order,$stripeCharge, $this->deposit, 'deposit');
                $order->update(['status' => 3]);
            } catch (\Exception $e) {
                $this->paymentError = $e->getMessage();
                $order->update(['status' => 6]);
                $this->loading = false;
                return;
            }
        } else {
            try {
                $stripeCharge = $user->charge(
                    $this->total, $paymentMethod
                );
                $this->createCharge($order,$stripeCharge, $this->total, 'full');
                $order->update(['status' => 2]);
            } catch (\Exception $e) {
                $this->paymentError = $e->getMessage();
                $order->update(['status' => 6]);
                $this->loading = false;
                return;
            }
        }

        Notification::makeNew(Order::class, $order);

        event(new NewOrder($order));

        $this->emit('newNotification');

        $this->loading = false;

        return redirect()->route('order', $order->id);

    }

    public function createCharge($order, $stripeCharge, $amount, $type)
    {
        if($stripeCharge->status === 'succeeded'){
            $status = 1;
        } else {
            $status = 2;
        }

        OrderPayment::create([
            'order_id' => $order->id,
            'amount' => $amount,
            'type' => $type,
            'status' => $status,
            'stripe_payment_intent_id' => $stripeCharge->id,
            'stripe_payment_method_id' => $stripeCharge->payment_method,
        ]);
    }

    public function paymentClicked($type)
    {
        $this->payment = $type;

        if($this->payment === 'deposit'){
            $this->showDepositMessage = true;
        }
    }



    private function products(): Collection
    {
        if(empty($this->basket)) {

            return new Collection;

        }

        return Product::whereIn('id', array_keys($this->basket))
            ->get()
            ->map(function (Product $product) {
                return (object)[
                    'id' => $product->id,
                    'title' => $product->title,
                    'slug' => $product->slug,
                    'image' => Storage::url($product->mainImage()->image),
                    'price' => $price = $product->priceToUse(),
                    'formatted_price' => int_to_decimal($price),
                    'qty' => $qty = $this->basket[$product->id]['qty'],
                    'total_raw' => $total = $price * $qty,
                    'total' => int_to_decimal($total),
                    'attributes' => $this->basket[$product->id]['attributes']
                ];
            });
    }

    public function render()
    {
        return view('livewire.checkout');
    }
}
