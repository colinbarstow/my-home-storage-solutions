<!DOCTYPE html>
<html lang="en">
@include('front.partials._head')
<body class="home">
    @include('front.partials._loader')
    <div class="page-wrapper">
        <h1 class="d-none">{{ config('app.name') }} - {{ $page->title ?? '' }}</h1>
        @include('front.header._header')

        @yield('content')

        @include('front.footer._footer')
    </div>

    @include('front.partials._totop')

    @include('front.mobile.menu')

    @include('front.partials.scripts')
</body>

</html>
