{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    @if(Auth::user()->hasPermissionTo('site config'))

        <livewire:storage-configurator-manager />

    @endif

@endsection


{{-- Scripts Section --}}
@section('scripts')

    <script src="{{ asset('js/pages/custom/profile/profile.js') }}"></script>

@endsection
