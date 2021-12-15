{{-- Aside --}}

<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside" style="overflow-x: auto">

    {{-- Aside menu --}}
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">

        @if (config('layout.aside.self.display') === false)
            <div class="header-logo">
                <a href="{{ url('/') }}">
                    <img alt="{{ config('app.name') }}" src="{{ asset('media/logos/'.$kt_logo_image) }}"/>
                </a>
            </div>
        @endif

        <div
            id="kt_aside_menu"
            class="aside-menu my-4 {!! Metronic::printClasses('aside_menu', false) !!}"
            data-menu-vertical="1"
            {!! Metronic::printAttrs('aside_menu') !!}>

            <ul class="menu-nav {!! Metronic::printClasses('aside_menu_nav', false) !!}">
                {!! Menu::renderVerMenu(config('menu_aside.items')) !!}
            </ul>
        </div>
    </div>

</div>
