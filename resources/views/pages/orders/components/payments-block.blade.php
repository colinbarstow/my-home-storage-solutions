<div class="card card-custom gutter-b">
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">Payments</span>
        </h3>
    </div>

    <div class="card-body pt-3 pb-0">
        {{-- Table --}}
        <div class="table-responsive">
            <table class="table table-borderless table-vertical-center">
                <thead>
                <tr>
                    <th class="p-0" style="width: 200px">Payment ID</th>
                    <th class="p-0" style="min-width: 100px">Payment amount</th>
                    <th class="p-0" style="min-width: 100px">Payment type</th>
                    <th class="p-0" style="min-width: 50px">Stripe ID</th>
                    <th class="p-0" style="min-width: 100px">Payment Timestamp</th>
                    <th class="p-0" style="min-width: 200px">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->payments as $payment)
                    <tr>
                        <td class="pl-0">
                            <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{ $payment->id }}</a>
                        </td>

                        <td class="text-left">
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                {{ $payment->formattedAmount() }}
                            </span>
                        </td>

                        <td class="text-left">
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                {{ $payment->type }}
                            </span>
                        </td>

                        <td class="text-left">
                             <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                {{ $payment->stripe_payment_intent_id }}
                            </span>
                        </td>

                        <td class="text-left">
                             <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                {{ $payment->created_at }}
                            </span>
                        </td>

                        <td>
                            @if($payment->refunded === null)
                                <livewire:refund-payment :payment="$payment"/>
                            @else
                                <p>Payment already refunded - no further actions allowed</p>
                            @endif
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
