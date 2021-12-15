@if($page->show_clients)
    <section class="mt-3 pt-10 pb-10 appear-animate" data-animation-options="{'delay': '.3s'}">
        <div class="container">
            <h2 class="title">Our Clients</h2>
            <div class="owl-carousel owl-theme row brand-carousel cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2"
                 data-owl-options="{
                                'nav': false,
                                'dots': false,
                                'autoplay': true,
                                'margin': 20,
                                'loop': true,
                                'responsive': {
                                    '0': {
                                        'items': 2
                                    },
                                    '576': {
                                        'items': 3
                                    },
                                    '768': {
                                        'items': 4
                                    },
                                    '992': {
                                        'items': 5
                                    },
                                    '1200': {
                                        'items': 6
                                    }
                                }
                            }">
                @foreach($clients as $client)
                    <figure>
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($client->image) }}" alt="brand" width="180" height="100" />
                    </figure>
                @endforeach
            </div>
        </div>
    </section>
@endif
