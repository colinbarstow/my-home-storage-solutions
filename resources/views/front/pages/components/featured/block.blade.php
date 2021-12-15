<section class="container mt-10 pt-3">
    <h2 class="title title-simple">Featured Items</h2>
    <div class="owl-carousel owl-theme row cols-lg-4 cols-md-3 cols-2"
     data-owl-options="{
        'items': 4,
        'nav': false,
        'dots': true,
        'margin': 20,
        'loop': false,
        'responsive': {
            '0': {
                'items': 2
            },
            '768': {
                'items': 3
            },
            '992': {
                'items': 4
            }
        }
    }"
>
    @foreach($featuredProducts as $fp)
        @include('front.pages.components.featured.single')
    @endforeach
</div>
</section>
