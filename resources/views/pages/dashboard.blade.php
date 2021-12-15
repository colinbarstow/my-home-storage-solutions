{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}

    <div class="row">


        <div class="col-lg-6 col-xxl-4">
            @include('pages.widgets._widget-2', ['class' => 'card-stretch gutter-b'])
        </div>

        <div class="col-lg-6">

{{--            <div id="chart" style="height: 300px;"></div>--}}

        </div>

    </div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
    <!-- Charting library -->
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
    <!-- Your application script -->
    <script>
        const chart = new Chartisan({
            el: '#chart',
            url: "{{ route('charts.daily_chart') }}",
        });
    </script>
@endsection
