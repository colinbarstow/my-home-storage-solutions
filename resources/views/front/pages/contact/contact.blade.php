@extends('front.layout')
@section('page-css')
    {{--    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/demo1.min.css') }}">--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/style.min.css') }}">
@endsection
@section('content')
    <div class="page-header" style="background-image: url(images/page-header.jpg)">
        <h1 class="page-title">Get in touch</h1>
    </div>
    <div class="page-content mt-10 pt-4">
        <section class="contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-xs-5 ls-m pt-3">
                        <h2 class="font-weight-bold text-uppercase ls-m mb-2">Contact us</h2>
                        <p>Looking for help? Fill the form and start a new adventure.</p>

                        <h4 class="mb-1 text-uppercase">Headquarters</h4>
                        <p>{{ config('site_configurations.details.address') }}</p>

                        <h4 class="mb-1 text-uppercase">Phone</h4>
                        <p><a href="tel:{{ config('site_configurations.details.contact_number') }}">{{ config('site_configurations.details.contact_number') }}</a></p>

                        <h4 class="mb-1 text-uppercase">Support</h4>
                        <p>
                            <a href="mailto:{{ config('site_configurations.details.contact_email') }}">{{ config('site_configurations.details.contact_email') }}</a><br>
                            <a href="#">{{ config('app.url') }}</a><br>
                        </p>
                    </div>
                    <div class="col-lg-9 col-md-8 col-xs-7">
                        <livewire:contact />
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
