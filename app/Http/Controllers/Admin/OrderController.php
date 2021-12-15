<?php

namespace App\Http\Controllers\Admin;

use App\Events\OrderAccepted;
use App\Events\OrderCancelled;
use App\Events\OrderComplete;
use App\Events\OrderRejected;
use App\Events\PaymentPrompt;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->get();
        $page_title = 'Orders';
        $page_description = 'From here you can view and manage your existing Orders.';

        return view('pages.orders.index', compact('page_title', 'page_description', 'orders'));
    }

    public function newIndex()
    {
        $orders = Order::whereIn('status', [2,3])->orderBy('id', 'desc')->get();
        $page_title = 'Orders';
        $page_description = 'From here you can view and manage your new Orders.';

        return view('pages.orders.new-index', compact('page_title', 'page_description', 'orders'));
    }

    public function inProgressIndex()
    {
        $orders = Order::where('status', 8)->orderBy('id', 'desc')->get();
        $page_title = 'Orders';
        $page_description = 'From here you can view and manage your In Progress Orders.';

        return view('pages.orders.in-progress-index', compact('page_title', 'page_description', 'orders'));
    }

    public function completeIndex()
    {
        $orders = Order::where('status', 1)->orderBy('id', 'desc')->get();
        $page_title = 'Orders';
        $page_description = 'From here you can view and manage your complete Orders.';

        return view('pages.orders.complete-index', compact('page_title', 'page_description', 'orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $order = Order::create([
           'user_id' => $user->id,
           'billing_address_id' => $request->billing_address_id,
           'shipping_address_id' => $request->shipping_address_id,
           'status' => 7,
           'deposit' => $this->getDepositAmount(),
           'total' => $this->getTotalAmount(),
        ]);
        $this->attemptToChargeUser($user, $order);
    }

    public function attemptToChargeUser($user, $order)
    {
        $user->createOrGetStripeCustomer();
        $user->charge(100, $paymentMethod, [
            'custom_option' => $value,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $page_title = 'Order ' . $order->id;
        $page_description = 'From here you can manage the order.';

        return view('pages.orders.show', compact('page_title', 'page_description', 'order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function markAsInProgress(Order $order)
    {
        $order->update([
            'status' => 8
        ]);

        return redirect()->route('admin.in-progress-orders');
    }

    public function prompt(Order $order)
    {
        $order->update([
            'payment_request' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        event(new PaymentPrompt($order));

        flash('A payment request has been emailed to the customer');

        return back();
    }

    public function cancel(Order $order)
    {
        $order->update([
            'status' => 5
        ]);

        flash('The Order has been successfully cancelled');

        event(new OrderCancelled($order));

        return redirect()->back();
    }

    public function accept(Request $request, Order $order)
    {
        $order->update([
            'status' => 8
        ]);

        flash('The Order has been successfully accepted');

        event(new OrderAccepted($order));

        return redirect()->back();
    }

    public function reject(Request $request, Order $order)
    {
        $order->update([
            'status' => 9
        ]);

        flash('The Order has been successfully rejected');

        $user = $order->user;

        foreach($order->payments as $payment){
            $user->refund($payment->stripe_payment_intent_id);
            $payment->update([
                'refunded' => $payment->amount
            ]);
        }


        event(new OrderRejected($order));

        return redirect()->back();
    }

    public function complete(Request $request, Order $order)
    {
        $order->update([
            'status' => 1
        ]);

        flash('The Order has been successfully marked as complete');

        event(new OrderComplete($order));

        return redirect()->back();
    }


}
