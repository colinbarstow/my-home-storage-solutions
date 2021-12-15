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
            <div class="card-toolbar">

            </div>
        </div>

        <div class="card-body">

            <strong>Activity:</strong> {{ $log->description }} <br>
            <strong>Caused By:</strong> {{ $log->causer->fullName() }} <br>
            @switch($log->getExtraProperty('customProperty'))
                @case('User Created')
                    <strong>User Created:</strong> {{ $log->subject->fullName() }} <br>
                    @break
                @case('Blog Created')
                    <strong>Blog Created:</strong> <a href="{{ route('admin.blogs.show', $log->subject->id) }}">{{ $log->subject->title }}</a> <br>
                    @break
                @case('Blog Updated')
                    <strong>Blog Updated:</strong> <a href="{{ route('admin.blogs.show', $log->subject->id) }}">{{ $log->subject->title }}</a> <br>
                    @break
                @case('Blog Deleted')
                    <strong>Blog Deleted:</strong> {{ $log->getExtraProperty('deletedModelName') }} <br>
                    @break
                @case('Facebook Blog Created')
                    <strong>Facebook Post Created:</strong> <a href="{{ route('admin.facebook-posts.show', $log->subject->id) }}">{{ $log->subject->blog->title }}</a> <br>
                    @break
                @case('Facebook Blog Updated')
                    <strong>Facebook Post Updated:</strong> <a href="{{ route('admin.facebook-posts.show', $log->subject->id) }}">{{ $log->subject->blog->title }}</a> <br>
                    @break
            @endswitch
            <strong>Date and Time:</strong> {{ \Carbon\Carbon::parse($log->created_at)->format('d-m-Y H:i:s') }} <br>

        </div>

    </div>

@endsection


@section('scripts')

@endsection
