@extends('front.layout')
@section('page-css')
    {{--    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/demo1.min.css') }}">--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/style.min.css') }}">
@endsection
@section('content')
    <div class="page-header" style="background-image: url(images/page-header.jpg)">
        <h1 class="page-title">About Us</h1>
    </div>
    <div class="page-content mt-10 pt-7">
        @include('front.pages.about.components.body')
        @include('front.pages.home.components.parallax')
        @include('front.pages.about.components.teams')
        @include('front.pages.components.clients')
    </div>
@endsection
