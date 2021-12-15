
@extends('layout.default')

@section('content')
    @if(Auth::user()->hasPermissionTo('view orders'))
        @if(Auth::user()->hasPermissionTo('manage orders'))
            <div class="row">
                <div class="col-xxl-12 order-xxl-1">
                    @include('pages.orders.components.action-block')
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-6 col-xxl-4">
                @include('pages.orders.components.customer-block')
            </div>

            <div class="col-lg-6 col-xxl-4">
                @include('pages.orders.components.shipping-block')
            </div>

            <div class="col-lg-6 col-xxl-4">
                @include('pages.orders.components.details-block')
            </div>

        </div>
        <div class="row">
            <div class="col-xxl-12 order-xxl-1">
                @include('pages.orders.components.payments-block')
            </div>
        </div>
        <div class="row">
            <div class="col-xxl-12 order-xxl-1">
                @include('pages.orders.components.products-block')
            </div>
        </div>
        @if($order->status !== 9)
            @if(Auth::user()->hasPermissionTo('note orders'))
                <div class="row">
                    <div class="col-xxl-12 order-xxl-1">
                        @include('pages.orders.components.notes')
                    </div>
                </div>
            @endif
        @endif
    @else
        <div class="row">
            <div class="col-lg-12">
                <p>You do not have permission to view orders</p>
            </div>
        </div>
    @endif
@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
@endsection
