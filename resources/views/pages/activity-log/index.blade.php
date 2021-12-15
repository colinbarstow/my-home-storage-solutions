{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

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
                    <th>Action</th>
                    <th>Caused By</th>
                    <th>Date and Time</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($logs as $log)
                        <tr>
                            @if($log->subject)
                                <td>
                                    <a href="{{ route('admin.activity-log.show', $log) }}">{{ $log->description }}</a>
                                </td>
                            @else
                                @if($log->getExtraProperty('deletedModelName'))
                                    <td>
                                        <a href="{{ route('admin.activity-log.show', $log) }}">{{ $log->description }}</a>
                                    </td>
                                @else
                                    <td>
                                        {{ $log->description }}
                                    </td>
                                @endif
                            @endif
                            <td>{{ $log->causer->fullName() }}</td>
                            <td>{{ \Carbon\Carbon::parse($log->created_at)->format('d-m-Y H:i:s') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>

@endsection

{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection


{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>

    <script src="{{ asset('js/pages/crud/datatables/basic/basic.js') }}" type="text/javascript"></script>
@endsection
