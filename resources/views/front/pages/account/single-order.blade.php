@extends('front.layout')
@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/style.min.css') }}">
@endsection
@section('content')
    <div class="page-header" style="background-image: url({{ asset('front/images/page-header.jpg') }}); background-color: #3C63A4;">
        <h1 class="page-title">My Account</h1>
        <ul class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="d-icon-home"></i></a></li>
            <li>My Account</li>
        </ul>
    </div>
    <div class="page-content mt-10 mb-10">
        <div class="container pt-1">
            <div class="tab tab-vertical">
                <ul class="nav nav-tabs mb-4">
                    <li class="nav-item">
                        <p class="nav-link">Order: {{ $order->id }}</p>
                    </li>
                    <li class="nav-item">
                        <p class="nav-link">Sub Total: {{ $order->formattedSubTotal() }}</p>
                    </li>
                    <li class="nav-item">
                        <p class="nav-link">Shipping: {{ $order->formattedDelivery() }}</p>
                    </li>
                    <li class="nav-item">
                        <p class="nav-link">Total: {{ $order->formattedTotal() }}</p>
                    </li>
                    <li class="nav-item">
                        <p class="nav-link">Amount Paid: {{ $order->formattedAmountPaid() }}</p>
                    </li>
                    <li class="nav-item">
                        <p class="nav-link">Amount Remaining: {{ $order->formattedAmountLeft() }}</p>
                    </li>
                </ul>
                <div class="tab-content" style="background-color: #f5fcff;">
                    <div class="tab-pane active">
                        <table class="shop-table cart-table mt-2">
                            <thead style="font-size:12px">
                            <tr>
                                <th style="font-size:10px">Product</th>
                                <th style="font-size:10px">Price</th>
                                <th style="font-size:10px">Quantity</th>
                                <th style="font-size:10px">Total</th>
                            </tr>
                            </thead>
                            <tbody>



                                @foreach($order->products as $product)
                                    <div>
                                        <tr>
                                            <td>{{ $product->title }}</td>
                                            <td>£{{ number_format($product->priceToUse()/100, 2) }}</td>
                                            <td>{{ $product->pivot->quantity }}</td>
                                            <td>£{{ number_format(($product->priceToUse()*$product->pivot->quantity)/100, 2) }}</td>
                                        </tr>
                                    </div>
                                @endforeach

                            </tbody>
                        </table>
                        <div style="margin-top: 10px">
                            @if($order->paymentIsRequired())

                                <livewire:single-order-block :order="$order">

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('front/js/make-payment.js') }}"></script>
@endsection
