@extends('front.layout')
@section('page-css')
    {{--    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/demo1.min.css') }}">--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/style.min.css') }}">
@endsection
@section('content')
    <div class="page-header" style="background-image: url({{ asset('front/images/page-header.jpg') }})">
        <h1 class="page-title">{{ config('site_configurations.details.website_name') }} FAQs</h1>
    </div>
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="d-icon-home"></i></a></li>
                <li><a href="#" class="active">FAQs</a></li>
            </ul>
        </div>
    </nav>
    <div class="page-content mt-6">
        <div class="container">
            <div class="row gutter-lg">
                <div class="col-lg-12">
                    <div class="posts">
                        @foreach($faqs as $faq)
                            <div class="card" style="padding: 10px; margin-bottom: 10px">
                                <div class="card-header">
                                    <h2>{{ $faq->question }}</h2>
                                </div>
                                <div class="card-body">
                                    <p>{{ $faq->question }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
