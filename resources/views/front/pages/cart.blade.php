@extends('front.layout')
@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/style.min.css') }}">
@endsection
@section('content')
    <livewire:cart />
@endsection
