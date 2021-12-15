@extends('front.layout')
@section('page-css')
    {{--    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/demo1.min.css') }}">--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/style.min.css') }}">
@endsection
@section('content')
    <div class="page-header" style="background-image: url({{ asset('front/images/page-header.jpg') }})">
        <h1 class="page-title">{{ config('site_configurations.details.website_name') }} Blog</h1>
    </div>
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="d-icon-home"></i></a></li>
                <li><a href="#" class="active">Blog</a></li>
            </ul>
        </div>
    </nav>
    <div class="page-content mt-6">
        <livewire:blog/>
    </div>
@endsection
