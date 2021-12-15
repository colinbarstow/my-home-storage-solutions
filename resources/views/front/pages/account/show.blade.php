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
                <ul class="nav nav-tabs mb-4" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#orders">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#address">Addresses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#account">Account details</a>
                    </li>
                </ul>
                <div class="tab-content" style="background-color: #f5fcff;">
                    <div class="tab-pane active" id="dashboard">
                        <p class="mb-2">
                            Hello <span>{{ Auth::user()->fullName() }}</span>
                        </p>
                        <p>
                            From your account dashboard you can view your <a href="#orders"
                                                                             class="link-to-tab text-secondary">recent orders</a>, manage your <a
                                href="#address" class="link-to-tab text-secondary">shipping and billing
                                addresses</a>, and <a href="#account" class="link-to-tab text-secondary">edit
                                your password and account details</a>.
                        </p>
                    </div>
                    <div class="tab-pane" id="orders" style="background-color: #f5fcff; padding:5px">

                        <table class="shop-table cart-table mt-2">
                            <thead style="font-size:12px">
                            <tr>
                                <th style="font-size:10px">ID</th>
                                <th style="font-size:10px">Items</th>
                                <th style="font-size:10px">Status</th>
                                <th style="font-size:10px">Sub Total</th>
                                <th style="font-size:10px">Shipping</th>
                                <th style="font-size:10px">Amount Paid</th>
                                <th style="font-size:10px">Amount Remaining</th>
                                <th style="font-size:10px">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                                @if($orders !== null)

                                    @foreach($orders as $key => $order)
                                        <div>
                                            <tr>
                                                <td>{{ $order->id }}</td>
                                                <td>{{ $order->totalProducts() }}</td>
                                                <td>{{ $order->status() }}</td>
                                                <td>{{ $order->formattedSubTotal() }}</td>
                                                <td>{{ $order->formattedDelivery() }}</td>
                                                <td>{{ $order->formattedAmountPaid() }}</td>
                                                <td>{{ $order->formattedAmountLeft() }}</td>
                                                <td>
                                                    @if($order->paymentIsRequired())
                                                        <a href="{{ route('single-order', $order->id) }}" style="font-size:10px" class="btn btn-primary">Make a payment</a>
                                                    @else
                                                        <a href="{{ route('single-order', $order->id) }}" style="font-size:10px" class="btn btn-primary">View Order</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        </div>
                                    @endforeach

                                @else

                                    <tr>
                                        <td colspan="8">No order has been made yet.</td>
                                    </tr>

                                @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane" id="address">
                        <div class="row">
                            <livewire:user-address type="billing" />

                            <livewire:user-address type="shipping" />
                        </div>
                    </div>
                    <div class="tab-pane" id="account">
                        <livewire:user-account/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-scripts')

@endsection
