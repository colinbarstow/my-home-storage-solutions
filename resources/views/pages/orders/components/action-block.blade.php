<div class="card card-custom" style="margin-bottom: 20px">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">Order No. {{ $order->id }}
            </h3>
        </div>
        <div class="card-toolbar" style="display: inline-block">
            <h3>{{ $order->status() }}</h3>
            @if($order->promptSent())
                <p class="text-muted">Request for payment sent {{ $order->payment_request }}</p>
            @endif
        </div>
    </div>

    <div class="card-body">

        <div class="row">
            <div class="col-lg-12">
                <h4>Actions</h4>
                {!! $order->adminButtons() !!}
                @if(Auth::user()->hasPermissionTo('prompt orders'))
                    @if($order->notPaidInFull())
                        @if(!$order->promptSentInPast24Hours())
                            <form style="display: inline;" method="POST" action="{{ route('admin.order.prompt', $order->id) }}">
                                @csrf
                                <button style="margin-right:15px" class="btn btn-danger"><i class="fa fa-gbp"></i> Request Payment</button>
                            </form>
                        @endif
                    @endif
                @endif
            </div>
        </div>
    </div>

</div>
