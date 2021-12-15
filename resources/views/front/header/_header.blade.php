<header class="header">
    @if(config('site_configurations.details.show_banner'))
    <div class="header-top">
        <div class="container">
            @include('front.header._left')
            @include('front.header._right')
        </div>
    </div>
    @endif
    @include('front.header.nav._main')
</header>
