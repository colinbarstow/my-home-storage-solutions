@if($page->show_featured_items)
    <section class="product-wrapper container appear-animate mt-10 pt-3 pb-8" data-animation-options="{'delay': '.3s'}">
        <h2 class="title">Our Featured Products</h2>
        <div class="owl-carousel owl-theme row owl-nav-full cols-2 cols-md-3 cols-lg-4" data-owl-options="{
                            'items': 5,
                            'nav': false,
                            'loop': false,
                            'dots': true,
                            'margin': 20,
                            'responsive': {
                                '0': {
                                    'items': 2
                                },
                                '768': {
                                    'items': 3
                                },
                                '992': {
                                    'items': 4,
                                    'dots': false,
                                    'nav': true
                                }
                            }
                        }">
            @foreach($featuredProducts as $product)
                @include('front.components.single-product')
            @endforeach
        </div>
    </section>
@endif
