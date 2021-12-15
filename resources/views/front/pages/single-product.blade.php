@extends('front.layout')
@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/style.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/vendor/photoswipe/photoswipe.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/vendor/photoswipe/default-skin/default-skin.min.css') }}">
@endsection
@section('content')
    <main class="main mt-4">
        <div class="page-content mb-10">
            <div class="container">
                <div class="product product-single row mb-4">
                    <div class="col-md-6" style="background-color: #fff; padding:10px">
                        <div class="product-gallery pg-vertical">
                            <div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1">
                                <figure class="product-image">
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($product->mainImage()->image) }}"
                                         data-zoom-image="{{ \Illuminate\Support\Facades\Storage::url($product->mainImage()->image) }}"
                                         alt="{{ $product->title }}" width="800" height="900">
                                </figure>
                                @foreach($product->altImages() as $image)
                                    <figure class="product-image">
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($image->image) }}"
                                             data-zoom-image="images/product/product-2-800x900.jpg"
                                             alt="Women's Brown Leather Backpacks" width="800" height="900">
                                    </figure>
                                @endforeach
                            </div>
                            <div class="product-thumbs-wrap">
                                <div class="product-thumbs">
                                    <div class="product-thumb active">
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($product->mainImage()->image) }}" alt="{{ $product->title }} thumbnail"
                                             width="109" height="122">
                                    </div>
                                    @foreach($product->altImages() as $image)
                                        <div class="product-thumb">
                                            <img src="{{ \Illuminate\Support\Facades\Storage::url($image->image) }}" alt="{{ $product->title }} thumbnail"
                                                 width="109" height="122">
                                        </div>
                                    @endforeach
                                </div>
                                <button class="thumb-up disabled"><i class="fas fa-chevron-left"></i></button>
                                <button class="thumb-down disabled"><i class="fas fa-chevron-right"></i></button>
                            </div>
                        </div>
                    </div>
                    <livewire:product :product="$product" :attribs="$product->attributes" />
                </div>

                <div style="background-color: #fff">
                    <div class="tab tab-nav-simple product-tabs mb-4" style="padding:10px">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#product-tab-description">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#product-tab-additional">Additional</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#product-tab-shipping-returns">Shipping &amp; Returns</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#product-tab-reviews">Reviews ({{ $product->reviews->count() }})</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active in" id="product-tab-description">
                                {!! $product->description !!}
                            </div>
                            <div class="tab-pane" id="product-tab-additional">
                                {!! $product->additional !!}
                            </div>
                            <div class="tab-pane " id="product-tab-shipping-returns">
                                {{--                            {!! $product->shipping->description !!}--}}
                                <h6 class="mb-2">{{ $product->shipping->carrier }} - {{ $product->shipping->delivery_time }}</h6>
                                <p>
                                    {!! $product->shipping->description !!}
                                </p>
                            </div>
                            <div class="tab-pane " id="product-tab-reviews">
                                @if($product->reviews->count() >= 1)
                                    <div class="d-flex align-items-center mb-5">
                                        <h4 class="mb-0 mr-2">Average Rating:</h4>
                                        <div class="ratings-container average-rating mb-0">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width:{{ $product->averageRating() }}%"></span>
                                                <span class="tooltiptext tooltip-top">4.00</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($product->reviews->count() >= 1)
                                    <div class="comments mb-6">
                                        <ul>
                                            @foreach($product->reviews as $review)
                                                <li>
                                                    <div class="comment">
                                                        <figure class="comment-media">
                                                            <a href="#">
                                                                <img src="images/blog/comments/1.jpg" alt="avatar">
                                                            </a>
                                                        </figure>
                                                        <div class="comment-body">
                                                            <div class="comment-rating ratings-container mb-0">
                                                                <div class="ratings-full">
                                                                    <span class="ratings" style="width:{{ $review->rating() }}%"></span>
                                                                    <span class="tooltiptext tooltip-top">4.00</span>
                                                                </div>
                                                            </div>
                                                            <div class="comment-user">
                                                                <h4><a href="#">{{ $review->user->fullName() }}</a></h4>
                                                                <span class="comment-date">{{ \Carbon\Carbon::parse($review->created_at)->toFormattedDateString() }}</span>
                                                            </div>

                                                            <div class="comment-content">
                                                                <p>{{ $review->review }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @else
                                    <div class="comments mb-6" style="border: none">
                                        <p>There has been no reviews for this product yet, to leave one please use the form below</p>
                                    </div>
                            @endif
                            <!-- End Comments -->
                                <div class="reply">
                                    <div class="title-wrapper text-left">
                                        <h3 class="title title-simple text-left text-normal">Add a Review</h3>
                                    </div>
                                    @auth
                                        <form action="#">
                                                <div class="rating-form">
                                                    <label for="rating">Your rating: </label>
                                                    <span class="rating-stars selected">
                                                    <a class="star-1" href="#">1</a>
                                                    <a class="star-2" href="#">2</a>
                                                    <a class="star-3" href="#">3</a>
                                                    <a class="star-4 active" href="#">4</a>
                                                    <a class="star-5" href="#">5</a>
                                                </span>

                                                <select name="rating" id="rating" required="" style="display: none;">
                                                    <option value="">Rate…</option>
                                                    <option value="5">Perfect</option>
                                                    <option value="4">Good</option>
                                                    <option value="3">Average</option>
                                                    <option value="2">Not that bad</option>
                                                    <option value="1">Very poor</option>
                                                </select>
                                            </div>
                                            <textarea id="reply-message" cols="30" rows="4" class="form-control mb-4"
                                                      placeholder="Comment *" required></textarea>

                                            <button type="submit" class="btn btn-primary btn-md">Submit<i
                                                    class="d-icon-arrow-right"></i></button>
                                        </form>
                                    @endauth
                                    @guest
                                        <p>To Leave a review please login or register</p>
                                    @endguest
                                </div>
                                <!-- End Reply -->
                            </div>
                        </div>
                    </div>
                </div>

                @include('front.pages.home.components.featured-items');
            </div>
        </div>
    </main>
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

        <!-- Background of PhotoSwipe. It's a separate element as animating opacity is faster than rgba(). -->
        <div class="pswp__bg"></div>

        <!-- Slides wrapper with overflow:hidden. -->
        <div class="pswp__scroll-wrap">

            <!-- Container that holds slides.
            PhotoSwipe keeps only 3 of them in the DOM to save memory.
            Don't modify these 3 pswp__item elements, data is added later on. -->
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
            <div class="pswp__ui pswp__ui--hidden">

                <div class="pswp__top-bar">

                    <!--  Controls are self-explanatory. Order can be changed. -->

                    <div class="pswp__counter"></div>

                    <button class="pswp__button pswp__button--close" aria-label="Close (Esc)"></button>
                    <button class="pswp__button pswp__button--zoom" aria-label="Zoom in/out"></button>

                    <div class="pswp__preloader">
                        <div class="loading-spin"></div>
                    </div>
                </div>

                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>

                <button class="pswp__button--arrow--left" aria-label="Previous (arrow left)"></button>
                <button class="pswp__button--arrow--right" aria-label="Next (arrow right)"></button>

                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-scripts')
    <script src="{{ asset('front/vendor/sticky/sticky.min.js') }}"></script>
    <script src="{{ asset('front/vendor/photoswipe/photoswipe.min.js') }}"></script>
    <script src="{{ asset('front/vendor/photoswipe/photoswipe-ui-default.min.js') }}"></script>
@endsection
