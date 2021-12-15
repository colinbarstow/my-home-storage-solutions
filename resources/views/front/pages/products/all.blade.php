@extends('front.layout')
@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/style.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/vendor/nouislider/nouislider.min.css') }}">
@endsection
@section('content')
    <div class="page-header bg-dark"
         style="background-image: url(''); background-color: #3C63A4;">
        <h3 class="page-subtitle">Products</h3>
        <h1 class="page-title">All products</h1>
        <ul class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="d-icon-home"></i></a></li>
            <li><a href="">Products</a></li>
            <li>All Products</li>
        </ul>
    </div>
    <div class="page-content mb-10">
        <div class="container">
            <div class="row main-content-wrap gutter-lg">
                <aside
                    class="col-lg-3 sidebar sidebar-fixed sidebar-toggle-remain shop-sidebar sticky-sidebar-wrapper">
                    <div class="sidebar-overlay">
                        <a class="sidebar-close" href="#"><i class="d-icon-times"></i></a>
                    </div>
                    <div class="sidebar-content">
                        <div class="sticky-sidebar" data-sticky-options="{'top': 10}">

                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">All Categories</h3>
                                <ul class="widget-body filter-items search-ul">
                                    @foreach($categories as $cat)
                                        <li>
                                            <a href="{{ route('single-product-category', $cat->slug) }}">{{ $cat->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </aside>
                <div class="col-lg-9 main-content">
                    <nav class="toolbox sticky-toolbox sticky-content fix-top">
                        <div class="toolbox-left">


                        </div>
                        <div class="toolbox-right">
                            {{ $products->links() }}
                        </div>
                    </nav>
                    <div class="row cols-2 cols-sm-3 product-wrapper">
                        @foreach($products as $product)
                            <div class="product-wrap">
                                <div class="product shadow-media">
                                    <figure class="product-media">
                                        <a href="{{ route('single-product', $product->slug) }}">
                                            <img src="{{ \Illuminate\Support\Facades\Storage::url($product->mainImage()->thumbnail) }}" alt="{{ $product->title }}" width="280" height="315">
                                        </a>
                                        <div class="product-label-group">
                                            @if($product->isNew())
                                                <label class="product-label label-new">new</label>
                                            @endif
                                            @if($product->isOnSale()))
                                                <label class="product-label label-sale">{{ $product->salePercentage() }} off</label>
                                            @endif
                                        </div>
                                        <div class="product-action">
                                            <a href="{{ route('single-product', $product->slug) }}" class="btn-product" title="Quick View">View</a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <a href="#" class="btn-wishlist" title="Add to wishlist"><i
                                                class="d-icon-heart"></i></a>
                                        <div class="product-cat">
                                            <a href="{{ route('single-product-category', $product->product_category->slug) }}">{{ $product->product_category->title }}</a>
                                        </div>
                                        <h3 class="product-name">
                                            <a href="{{ route('single-product', $product->slug) }}">{{ $product->title }}</a>
                                        </h3>
                                        @if($product->sale_price !== null)
                                            <div class="product-price">
                                                <ins class="new-price">{{ $product->formattedSalePrice() }}</ins><del class="old-price">{{ $product->formattedPrice() }}</del>
                                            </div>
                                        @else
                                            <div class="product-price">
                                                <ins class="new-price">{{ $product->formattedPrice() }}</ins>
                                            </div>
                                        @endif
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width:{{ $product->averageRating() }}%"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="{{ route('single-product', $product->slug) }}" class="rating-reviews">( {{ $product->reviews->count() }} reviews )</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
