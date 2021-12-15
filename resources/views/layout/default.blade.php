<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {!! Metronic::printAttrs('html') !!} {!! Metronic::printClasses('html') !!}>
    <head>
        <meta charset="utf-8"/>

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }} | @yield('title', $page_title ?? '')</title>

        <meta name="description" content="@yield('page_description', $page_description ?? '')"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

        <link rel="shortcut icon" href="{{ \Illuminate\Support\Facades\Storage::url(config('site_configurations.details.logo')) }}" />

        {!!  Metronic::getGoogleFontsInclude() !!}

        @foreach(config('layout.resources.css') as $style)
            <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($style)) : asset($style) }}" rel="stylesheet" type="text/css"/>
        @endforeach

        @foreach (Metronic::initThemes() as $theme)
            <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($theme)) : asset($theme) }}" rel="stylesheet" type="text/css"/>
        @endforeach

        @yield('styles')

        @livewireStyles
    </head>

    <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable">

        @if (config('layout.page-loader.type') != '')
            @include('layout.partials._page-loader')
        @endif

        @include('layout.base._layout')

        <script>var HOST_URL = "{{ route('quick-search') }}";</script>

        <script>
            var KTAppSettings = {!! json_encode(config('layout.js'), JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES) !!};
        </script>


        @foreach(config('layout.resources.js') as $script)
            <script src="{{ asset($script) }}" type="text/javascript"></script>
        @endforeach
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js "></script>

        @livewireScripts

        @yield('scripts')

    </body>
</html>

