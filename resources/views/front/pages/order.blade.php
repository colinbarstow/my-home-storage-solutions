@extends('front.layout')
@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/style.min.css') }}">
@endsection
@section('content')
    <main class="main order">
        <div class="page-content pt-10 pb-10">
            <div class="step-by pt-2 pb-2 pr-4 pl-4">
                <h3 class="title title-simple title-step visited"><a href="{{ route('cart') }}">1. Shopping Cart</a></h3>
                <h3 class="title title-simple title-step visited"><a href="{{ route('checkout') }}">2. Checkout</a></h3>
                <h3 class="title title-simple title-step active"><a href="{{ route('order', $order->id) }}">3. Order Complete</a></h3>
            </div>
            <div class="container mt-8">
                <div class="order-message">
                    <i class="fas fa-check"></i>Thank you, Your order has been received.
                </div>


                <div class="order-results pt-8 pb-8">
                    <div class="overview-item">
                        <span>Order number</span>
                        <strong>{{ $order->id }}</strong>
                    </div>
                    <div class="overview-item">
                        <span>Status</span>
                        <strong>{{ $order->status() }}</strong>
                    </div>
                    <div class="overview-item">
                        <span>Date</span>
                        <strong>{{ \Carbon\Carbon::parse($order->created_at)->toFormattedDateString() }}</strong>
                    </div>
                    <div class="overview-item">
                        <span>Total</span>
                        <strong>{{ $order->formattedTotal() }}</strong>
                    </div>
                    <div class="overview-item">
                        <span>Payment method</span>
                        <strong>Card</strong>
                    </div>
                </div>

                <h2 class="title title-simple text-left pt-3">Order Details</h2>
                <div class="order-details mb-1">
                    <table class="order-details-table">
                        <thead>
                        <tr class="summary-subtotal">
                            <td>
                                <h3 class="summary-subtitle">Product</h3>
                            </td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->products as $product)
                        <tr>
                            <td class="product-name">{{ $product->title }} <span> <i class="fas fa-times"></i> {{ $product->pivot->quantity }}</span></td>
                            <td class="product-price">{{ $product->formattedPrice() }}</td>
                        </tr>
                        @endforeach
                        <tr class="summary-subtotal">
                            <td>
                                <h4 class="summary-subtitle">Subtotal:</h4>
                            </td>
                            <td class="summary-subtotal-price">{{ $order->formattedSubTotal() }}</td>
                        </tr>
                        <tr class="summary-subtotal">
                            <td>
                                <h4 class="summary-subtitle">Shipping:</h4>
                            </td>
                            <td class="summary-subtotal-price">{{ $order->formattedDelivery() }}</td>
                        </tr>
                        <tr class="summary-subtotal">
                            <td>
                                <h4 class="summary-subtitle">Payment method:</h4>
                            </td>
                            <td class="summary-subtotal-price">Card</td>
                        </tr>
                        <tr class="summary-subtotal">
                            <td>
                                <h4 class="summary-subtitle">Total</h4>
                            </td>
                            <td>
                                <p class="summary-total-price">{{ $order->formattedTotal() }}</p>
                            </td>
                        </tr>
                        <tr class="summary-subtotal">
                            <td>
                                <h4 class="summary-subtitle">Amount Paid</h4>
                            </td>
                            <td>
                                <p class="summary-total-price">{{ $order->formattedAmountPaid() }}</p>
                            </td>
                        </tr>
                        <tr class="summary-subtotal">
                            <td>
                                <h4 class="summary-subtitle">Amount left to pay</h4>
                            </td>
                            <td>
                                <p class="summary-total-price">{{ $order->formattedAmountLeft() }}</p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <h2 class="title title-simple text-left pt-8 mb-2">Billing Address</h2>
                <div class="address-info pb-8 mb-6">
                    <p class="address-detail pb-2">
                        {!! Auth::user()->billingAddress->forRender() !!}
                    </p>
                    <p class="email">{{ Auth::user()->email }}</p>
                </div>

                <h2 class="title title-simple text-left pt-8 mb-2">Shipping Address</h2>
                <div class="address-info pb-8 mb-6">
                    <p class="address-detail pb-2">
                        {!! Auth::user()->shippingAddress->forRender() !!}
                    </p>
                </div>

                <a href="{{ route('my-account') }}" class="btn btn-icon-left btn-back btn-md mb-4"><i class="d-icon-arrow-left"></i> Go to my account</a>
            </div>
        </div>
    </main>
@endsection

