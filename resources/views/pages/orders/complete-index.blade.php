{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    @if(Auth::user()->hasPermissionTo('view orders'))
        <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">{{ $page_title }}
                    <div class="text-muted pt-2 font-size-sm">{{ $page_description }}</div>
                </h3>
            </div>

        </div>

        <div class="card-body">



            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Amount Paid</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                @foreach($orders as $order)

                    <tr>

                        <td>{{ $order->id }}</td>

                        <td>{{ $order->user->fullName() }}</td>

                        <td>{{ $order->status() }}</td>

                        <td>{{ $order->formattedTotal() }}</td>

                        <td>{{ $order->formattedAmountPaid() }}</td>

                        <td>
                            <span style="overflow: visible; position: relative; width: 125px;">
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-clean btn-icon mr-2" title="View Order">
                                    {!! Metronic::getSVG("media/svg/icons/General/Visible.svg", "svg-icon-md svg-icon-primary") !!}
                                </a>
                            </span>
                        </td>

                    </tr>

                @endforeach
                </tbody>
            </table>

        </div>

    </div>
    @else
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">You do not have permission to view orders please contact a system admin if you require access</h3>
            </div>
        </div>
    @endif
@endsection

{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection


{{-- Scripts Section --}}
@section('scripts')
    {{-- vendors --}}
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>

    {{-- page scripts --}}
    <script src="{{ asset('js/pages/crud/datatables/basic/basic.js') }}" type="text/javascript"></script>
@endsection
