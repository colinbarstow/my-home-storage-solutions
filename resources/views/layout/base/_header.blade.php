{{-- Header --}}
<div id="kt_header" class="header header-fixed">

    {{-- Container --}}
    <div class="container-fluid d-flex align-items-center justify-content-between">

            {{-- Header Menu --}}
            <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                <div class="header-logo">
                    <a href="{{ url('/') }}">
                        <img alt="Logo" src="{{ \Illuminate\Support\Facades\Storage::url(config('site_configurations.details.logo')) }}" height="30px"/>
                    </a>
                </div>
            </div>


        @include('layout.partials.extras._topbar')
    </div>
</div>
