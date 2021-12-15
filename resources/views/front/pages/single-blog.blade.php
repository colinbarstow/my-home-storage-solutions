@extends('front.layout')
@section('page-css')
    {{--    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/demo1.min.css') }}">--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/style.min.css') }}">
@endsection
@section('content')
    <div class="page-header" style="background-image: url('{{ \Illuminate\Support\Facades\Storage::url($blog->image) }}')">
    <h1 class="page-title">{{ $blog->title }}</h1>
    </div>
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="d-icon-home"></i></a></li>
                <li><a href="{{ route('blog') }}" class="active">Blog</a></li>
                <li>{{ $blog->title }}</li>
            </ul>
        </div>
    </nav>
    <div class="page-content mt-6">
        <div class="container">
            <div class="row gutter-lg">
                <div class="col-lg-12">
                    <article class="post-single">
                        <figure class="post-media">
                            <a href="#">
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($blog->image) }}" width="870" height="420" alt="{{ $blog->title }}" />
                            </a>
                        </figure>
                        <div class="post-details">
                            <div class="post-meta">
                                Posted by <a href="#" class="post-author" {{ $blog->author }}</a>
                                /
                                <a href="#" class="post-date">{{ \Carbon\Carbon::parse($blog->created_at)->toFormattedDateString() }}</a>
                                /
                                <a href="#" class="post-comment">{{ $blog->comments->count() }} Comments</a>
                            </div>
                            <h4 class="post-title"><a href="{{ route('single-blog', $blog->slug) }}">{{ $blog->title }}</a></h4>
                            <div class="post-cats">
                                in <a href="{{ route('blog') }}">{{ $blog->category->title }}</a>
                            </div>
                            <div class="post-body mb-7">
                                {!! $blog->content !!}
                            </div>
                            <!-- End Post Body -->
                            <div class="post-footer d-flex justify-content-between align-items-center">
                                <div class="social-links inline-links mb-6">
                                    <label>Share this post:</label>
                                    <a href="#" class="social-link social-facebook fab fa-facebook-f"
                                       style="color: #8f79ed"></a>
                                    <a href="#" class="social-link social-twitter fab fa-twitter"
                                       style="color: #79c8ed"></a>
                                    <a href="#" class="social-link fab fa-pinterest" style="color: #e66262"></a>
                                </div>
                            </div>

                        </div>
                    </article>

                    <!-- End Page Navigation -->
                    <div class="related-posts mt-9 mb-9">
                        <h3 class="title title-simple text-left text-normal">Popular Posts</h3>
                        <div class="owl-carousel owl-theme row cols-lg-3 cols-sm-2" data-owl-options="{
                                    'items': 1,
                                    'margin': 20,
                                    'loop': false,
                                    'responsive': {
                                        '576': {
                                            'items': 2
                                        },
                                        '992': {
                                            'items': 3
                                        }
                                    }
                                }">
                            @foreach($populars as $popular)
                                <div class="post">
                                    <figure class="post-media">
                                        <a href="{{ route('single-blog', $popular->slug) }}">
                                            <img src="{{ \Illuminate\Support\Facades\Storage::url($popular->image) }}" width="380" height="250"
                                                 alt="{{ $popular->title }}" />
                                        </a>
                                    </figure>
                                    <div class="post-details">
                                        <div class="post-meta">
                                            <a href="#" class="post-date">{{ \Carbon\Carbon::parse($popular->created_at)->toFormattedDateString() }}</a>
                                            |
                                            <a href="#" class="post-comment">{{ $popular->comments->count() }} Comments</a>
                                        </div>
                                        <h4 class="post-title"><a href="#">{{ $popular->title }}</a></h4>
                                        <div class="post-cats">
                                            in <a href="{{ route('blog') }}">{{ $popular->category->title }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <livewire:blog-comment :blog="$blog">
                </div>
            </div>
        </div>
    </div>
@endsection
