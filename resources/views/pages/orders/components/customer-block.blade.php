<div class="card card-custom gutter-b" style="height: 420px">
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">Customer Details</span>
        </h3>
    </div>
    <div class="card-body pt-8">

        <div class="d-flex align-items-center mb-10">

            <div class="d-flex flex-column font-weight-bold">
                <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">{{ $order->user->fullName() }}</a>
                <span class="text-muted">User since: {{ \Carbon\Carbon::parse($order->user->created_at)->toFormattedDateString() }}</span>
            </div>
        </div>


        <div class="d-flex align-items-center mb-10">

            <div class="d-flex flex-column font-weight-bold">
                <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Billing Address</a>
                <span class="text-muted">{{ $order->billingAddress->first_name }} {{ $order->billingAddress->last_name }}</span>
                <span class="text-muted">{{ $order->billingAddress->compiled() }}</span>
            </div>
        </div>

        <div class="d-flex align-items-center mb-10">

            <div class="d-flex flex-column font-weight-bold">
                <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Email</a>
                <span class="text-muted">{{$order->user->email }}</span>
            </div>
        </div>

    </div>
</div>
