<div class="product">
    <figure class="product-media">
        <a href="{{ route('single-product', $product->slug) }}">
            <img style="min-height:200px" src="{{ \Illuminate\Support\Facades\Storage::url($product->mainImage()->thumbnail) }}" alt="{{ $product->title }}"
                 width="280">
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
