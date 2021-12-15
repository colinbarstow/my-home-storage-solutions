<section class="grey-section pt-10 pb-10 appear-animate" data-animation-options="{'delay': '.3s'}">

    <div class="container pt-3">

        <h2 class="title">Browse Our Categories</h2>

        <div class="row">

            @foreach($categories as $category)

                <div class="col-md-3 col-6 col-lg-3 col-sm-6 col-xs-6 mb-4">

                    <div class="category category-default category-default-1 category-absolute overlay-zoom">

                        <a href="{{ route('single-product-category', $category->slug) }}">

                            <figure class="category-media">

                                <div style="
                                    background-image: url('{{ \Illuminate\Support\Facades\Storage::url($category->thumbnail) }}');
                                    background-repeat: no-repeat;
                                    background-size: contain;
                                    background-position: center;
                                    height:280px;">
                                </div>

                            </figure>

                        </a>

                        <div class="category-content">

                            <h4 class="category-name"><a href="{{ route('single-product-category', $category->slug) }}">{{ $category->title }}</a></h4>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>
