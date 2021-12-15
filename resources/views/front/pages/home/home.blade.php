@extends('front.layout')
    @section('page-css')
        <link rel="stylesheet" type="text/css" href="{{ asset('front/css/style.min.css') }}">
    @endsection
    @section('content')
        <main class="main">
            <div class="page-content">
                <section class="intro-section">
                    @include('front.pages.home.components.carousel')
                </section>

                @include('front.pages.home.components.featured-items')

                @include('front.pages.home.components.categories')

                @include('front.pages.home.components.best-sellers')

                @include('front.pages.home.components.parallax')

                @include('front.pages.components.clients')

                @include('front.pages.home.components.blog-block')

            </div>
        </main>
    @endsection
