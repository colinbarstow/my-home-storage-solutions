<div class="card card-custom gutter-b" style="height: 420px">

    <div class="card-header border-0 pt-5">

        <h3 class="card-title align-items-start flex-column">

            <span class="card-label font-weight-bolder text-dark">Order Details</span>

        </h3>

    </div>

    <div class="card-body pt-8">

        <div class="d-flex align-items-center mb-10">

            <div class="d-flex flex-column font-weight-bold">
                <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Total Products</a>
                <span class="text-muted">{{ $order->totalProducts() }}</span>
            </div>

        </div>

        <div class="d-flex align-items-center mb-10">

            <div class="d-flex flex-column font-weight-bold">
                <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Subtotal</a>
                <span class="text-muted">{{ $order->formattedSubTotal() }}</span>
            </div>

        </div>

        <div class="d-flex align-items-center mb-10">

            <div class="d-flex flex-column font-weight-bold">
                <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Shipping total</a>
                <span class="text-muted">{{ $order->formattedDelivery() }}</span>
            </div>

        </div>

        <div class="d-flex align-items-center mb-10">

            <div class="d-flex flex-column font-weight-bold">
                <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Total</a>
                <span class="text-muted">{{ $order->formattedTotal() }}</span>
            </div>

        </div>

    </div>
</div>
