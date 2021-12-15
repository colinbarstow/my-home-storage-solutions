<div>
    <div class="dropdown-box" id="drop-basket" style="{{ $this->styling }}">
            <div class="product product-cart-header">
                <span class="product-cart-counts">{{ $this->qty }} items</span>
                <span><a href="{{ route('cart') }}">View cart</a></span>
            </div>
            <div class="products scrollable">
                @forelse($this->products as $product)
                    <div class="product product-cart">
                        <div class="product-detail">
                            <a href="{{ route('single-product', $product->slug) }}" class="product-name">{{ $product->title }}</a>
                            <div class="price-box">
                                <span class="product-quantity">{{ $product->qty }}</span>
                                <span class="product-price">£{{ $product->formatted_price }}</span>
                            </div>
                        </div>
                        <figure class="product-media">
                            <a href="#">
                                <img src="{{ $product->image }}" alt="product" width="90"
                                     height="90" />
                            </a>
                            <button wire:click="remove({{ $product->id }})" class="btn btn-link btn-close">
                                <i class="fas fa-times"></i>
                            </button>
                        </figure>
                    </div>
                @empty
                    <div class="product product-cart">
                        Your basket is empty
                    </div>
                @endforelse
            </div>
            <!-- End of Products  -->
            <div class="cart-total">
                <label>Subtotal:</label>
                <span class="price">£{{ $this->subTotalFormatted }}</span>
            </div>
            <!-- End of Cart Total -->
            <div class="cart-action">
                <a href="{{ route('checkout') }}" class="btn btn-dark"><span>Checkout</span></a>
            </div>
            <!-- End of Cart Action -->
        </div>
</div>
