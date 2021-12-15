@extends('front.layout')
@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/style.min.css') }}">
@endsection
@section('content')
    @if(!empty(basket()->all()))
        @auth
            <livewire:checkout />
        @endauth
        @guest
            @include('front.pages.auth.login')
        @endguest
    @else
        @include('front.pages.checkout.empty')
    @endif
@endsection
@section('page-scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('front/js/payment.js') }}"></script>
@endsection

