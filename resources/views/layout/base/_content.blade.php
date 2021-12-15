{{-- Content --}}
@if (config('layout.content.extended'))
    @include('flash::message')
    @yield('content')
@else
    <div class="d-flex flex-column-fluid">
        <div class="container">
            @include('flash::message')
            @yield('content')
        </div>
    </div>
@endif
