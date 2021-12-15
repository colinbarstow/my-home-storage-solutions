<div class="col-md-6" style="background-color: #fff; padding:10px;">
        <div class="product-details">
            <div class="product-navigation">
                <ul class="breadcrumb breadcrumb-lg">
                    <li><a href="{{ route('home') }}"><i class="d-icon-home"></i></a></li>
                    <li><a href="{{ route('products') }}" class="active">Products</a></li>
                    <li>{{ $product->title }}</li>
                </ul>
            </div>

            <h1 class="product-name">{{ $product->title }}</h1>
            <div class="product-meta">
                Category: <span class="product-sku">{{ $product->product_category->title }}</span>
            </div>

            @if($product->isOnSale())
                <div class="product-price">
                    <ins class="new-price">{{ $product->formattedSalePrice() }}</ins><del class="old-price">{{ $product->formattedPrice() }}</del>
                </div>
            @else
                <div class="product-price">{{ $product->formattedPrice() }}</div>
            @endif
            <div class="ratings-container">
                <div class="ratings-full">
                    <span class="ratings" style="width:{{ $product->averageRating() }}%"></span>
                    <span class="tooltiptext tooltip-top"></span>
                </div>
                <a href="#product-tab-reviews" class="link-to-tab rating-reviews">( {{ $product->reviews->count() }} reviews )</a>
            </div>
            <p class="product-short-desc">{!! $product->short_description !!}</p>

            <hr class="product-divider">

            @if($product->has('attributes'))
                @foreach($product->attributes as $attribute)
                    <div class="ratings-container" style="margin-top:5px">
                        {!! $attribute->rendered() !!}
                    </div>
                @endforeach
            @endif


            <div class="product-form product-qty">
                <label>QTY:</label>
                <div class="product-form-group">
                    <div class="input-group">
                        <button class="quantity-minus d-icon-minus" wire:click="decrease"></button>
                        <input class="quantity form-control" wire:model.defer="quantity" value="1" type="number" min="1" max="1000000">
                        <button class="quantity-plus d-icon-plus" wire:click="increase"></button>
                    </div>

                    @if($this->error !== null)
                        <p style="color:red">{{ $this->error }}</p>
                    @endif

                    <button class="btn-product btn-cart" title="Add to cart" wire:click="addToBasket" id="addToBasket{{ $product->id }}">
                        {{ $this->text }}
                    </button>
                </div>
            </div>

{{--            <hr class="product-divider mb-3">--}}

{{--            <div class="product-footer">--}}
{{--                <div class="social-links">--}}
{{--                    <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>--}}
{{--                    <a href="#" class="social-link social-twitter fab fa-twitter"></a>--}}
{{--                    <a href="#" class="social-link social-vimeo fab fa-vimeo-v"></a>--}}
{{--                </div>--}}
{{--                <div class="product-action">--}}
{{--                    <a href="#" class="btn-product btn-wishlist"><i class="d-icon-heart"></i>Add To--}}
{{--                        Wishlist</a>--}}
{{--                    <span class="divider"></span>--}}
{{--                    <a href="#" class="btn-product btn-compare"><i class="d-icon-random"></i>Add To--}}
{{--                        Compare</a>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>

