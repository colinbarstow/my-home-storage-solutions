<div>
    <main class="main checkout">
            <div id="loader_lad" style="
                  opacity:    0.5;
                  background: #000;
                  width:      100%;
                  height:     100%;
                  z-index:    10;
                  top:        0;
                  left:       0;
                  position:   fixed;
                  display:    none
            ">
                <div style="color: #64d6e2; margin:25% auto;" class="la-ball-circus la-4x;">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>

        <div class="page-content pt-10 pb-10">
            <div class="step-by pt-2 pb-2 pr-4 pl-4">
                <h3 class="title title-simple title-step visited"><a href="{{ route('cart') }}">1. Shopping Cart</a></h3>
                <h3 class="title title-simple title-step active"><a href="{{ route('checkout') }}">2. Checkout</a></h3>
                <h3 class="title title-simple title-step"><a href="javascript:void(0)">3. Order Complete</a></h3>
            </div>
            <div class="container mt-8">
                <div class="row gutter-lg">
                    <div class="col-lg-7 col-sm-12 col-xs-12 col-sm-push-12 mb-6 order-2">
                        @include('front.pages.checkout.details-block')
                    </div>
                    <div class="col-lg-5 col-sm-12 col-xs-12 mb-6 col-sm-pull-12 order-1">
                        <div style="background-color: #fff; padding:20px; height: 500px;">
                            <h3 class="title title-simple text-left">Your Order</h3>
                            <div class="summary mb-4">
                                <table class="order-table">
                                    <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td class="product-name">{{ $product->title }} <strong class="product-quantity">×&nbsp;{{ $product->qty }}</strong></td>
                                            <td class="product-total">£{{ $product->total }}</td>
                                        </tr>
                                    @endforeach
                                    <tr class="summary-subtotal">
                                        <td>
                                            <h4 class="summary-subtitle">Subtotal</h4>
                                        </td>
                                        <td class="summary-subtotal-price">£{{ $this->subTotalFormatted }}</td>
                                    </tr>
                                    <tr class="summary-subtotal">
                                        <td>
                                            <h4 class="summary-subtitle">Delivery</h4>
                                        </td>
                                        <td class="summary-subtotal-price">£{{ $this->deliveryFormatted }}</td>
                                    </tr>
                                    <tr class="summary-subtotal">
                                        <td>
                                            <h4 class="summary-subtitle">Total</h4>
                                        </td>
                                        <td>
                                            <p class="summary-total-price">£{{ $this->totalFormatted }}</p>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

