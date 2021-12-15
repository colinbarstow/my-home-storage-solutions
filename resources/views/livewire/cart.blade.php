<main class="main cart">
    <div class="page-content pt-10 pb-10">
        <div class="step-by pt-2 pb-2 pr-4 pl-4">
            <h3 class="title title-simple title-step active"><a href="{{ route('cart') }}">1. Shopping Cart</a></h3>
            <h3 class="title title-simple title-step"><a href="javascript:void(0)">2. Checkout</a></h3>
            <h3 class="title title-simple title-step"><a href="javascript:void(0)">3. Order Complete</a></h3>
        </div>
        <div class="container mt-8 mb-4">
            <div class="row gutter-lg">
                <div class="col-lg-8 col-md-12">
                    <table class="shop-table cart-table mt-2">
                        <thead>
                        <tr>
                            <th><span>Product</span></th>
                            <th></th>
                            <th><span>Price</span></th>
                            <th><span>quantity</span></th>
                            <th>Subtotal</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td class="product-thumbnail">
                                    <figure>
                                        <a href="{{ route('single-product', $product->slug) }}">
                                            <img src="{{ $product->image }}" width="100" height="100" alt="product">
                                        </a>
                                        <a wire:click="remove({{ $product->id }})" class="product-remove" title="Remove this product">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    </figure>
                                </td>
                                <td class="product-name">
                                    <div class="product-name-section">
                                        <a href="{{ route('single-product', $product->slug) }}">{{ $product->title }}</a><br>
                                        @if(!empty($product->attributes))
                                            @foreach($product->attributes as $at)
                                                <small>{{ array_keys($at)[0] }}: {{ array_values($at)[0] }}</small>
                                            @endforeach
                                            <br><a style="color:red" href="{{ route('single-product', $product->slug) }}">Edit Attributes</a>
                                        @endif
                                    </div>
                                </td>
                                <td class="product-subtotal">
                                    <span class="amount">£{{ $product->total }}</span>
                                </td>
                                <td class="product-quantity">
                                    <div class="input-group">
                                        <button class="quantity-minus d-icon-minus" wire:click="decrease({{ $product->id }})"></button>
                                        <input class="form-control" value="{{ $product->qty }}" type="number" min="1" max="1000000">
                                        <button class="quantity-plus d-icon-plus" wire:click="increase({{ $product->id }})"></button>
                                    </div>
                                </td>
                                <td class="product-price">
                                    <span class="amount">£{{ $product->formatted_price }}</span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="cart-actions mb-6 pt-6">
                        <div class="coupon">
                            <input type="text" name="coupon_code" class="input-text form-control" id="coupon_code" value="" placeholder="Coupon code">
                            <button type="submit" class="btn btn-md">Apply Coupon</button>
                        </div>
                    </div>
                </div>
                <aside class="col-lg-4 sticky-sidebar-wrapper">
                    <div class="sticky-sidebar" data-sticky-options="{'bottom': 20}">
                        <div class="summary mb-4">
                            <h3 class="summary-title text-left">Cart Total</h3>
                            <table class="shipping">
                                <tr class="summary-subtotal">
                                    <td>
                                        <h4 class="summary-subtitle">Subtotal</h4>
                                    </td>
                                    <td>
                                        <p class="summary-subtotal-price">£{{ $this->subTotalFormatted }}</p>
                                    </td>
                                </tr>
                            </table>

                            <button wire:click="proceedToCheckout" class="btn btn-dark btn-checkout">Proceed to checkout</button>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</main>



