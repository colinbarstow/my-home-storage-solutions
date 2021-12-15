<div class="product product-classic appear-animate"
     data-animation-options="{
        'name': 'fadeInUpShorter',
        'delay': '.3s'
     }"
>
    <figure class="product-media">
        <a href="{{ route('single-product', $fp->slug) }}">
            @if($fp->mainImage())
            <img src="{{ \Illuminate\Support\Facades\Storage::url($fp->mainImage()->image) }}" alt="product" width="280"
                 height="315">
            @else
                <img src="{{ \Illuminate\Support\Facades\Storage::url($fp->images()->first()->image) }}" alt="product" width="280"
                      height="315">
            @endif
        </a>
        <div class="product-label-group">
            <label class="product-label label-new">new</label>
        </div>
    </figure>
    <div class="product-details">
    <div class="product-cat">
        <a href="{{ route('single-product-category', $fp->product_category->slug) }}">{{ $fp->product_category->title }}</a>
    </div>
    <h3 class="product-name">
        <a href="{{ route('single-product', $fp->slug) }}">{{ $fp->title }}</a>
    </h3>
    <div class="product-price">
        <span class="price">{{ $fp->formattedPrice() }}</span>
    </div>
    <div class="product-action">
{{--        <livewire:add-to-basket-button :product-id="$fp->id" />--}}
        <a href="{{ route('single-product', $fp->slug) }}" class="btn-product btn-cart" title="View">View</a>
        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i class="d-icon-heart"></i></a>
        <a href="#" class="btn-product-icon btn-quickview" title="Quick View"><i class="d-icon-search"></i></a>
    </div>
    </div>
</div>


