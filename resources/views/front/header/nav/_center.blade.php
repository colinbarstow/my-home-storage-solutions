<div class="header-center">
    <a href="{{ route('home') }}" class="logo">
        <img src="{{ \Illuminate\Support\Facades\Storage::url(config('site_configurations.details.logo')) }}" alt="logo" class="logo-header" />
    </a>
    <!-- End of Logo -->
    <nav class="main-nav">
        <ul class="menu">
            <li>
                <a href="{{ route('home') }}">Home</a>
            </li>
            <li>
                <a href="{{ route('storage-configurator') }}">storage Configurator</a>
            </li>
            <li>
                <a href="{{ route('products') }}">Products</a>
                <div class="megamenu">
                    <div class="row">
                        <div class="col-6 col-sm-4 col-md-3 col-lg-4">
                            <h4 class="menu-title">Product Categories</h4>
                            <ul>
                                @foreach(\App\Models\ProductCategory::where('active', true)->get() as $cat)
                                    <li><a href="{{ route('single-product-category', $cat->slug) }}">{{ $cat->title }}</a></li>
                                @endforeach
                                    <li><a href="{{ route('front.product-categories') }}">All Product Categories</a></li>
                            </ul>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-4">
                            <h4 class="menu-title">Latest Products</h4>
                            <ul>
                                @foreach(\App\Models\Product::latestSix() as $pro)
                                    <li><a href="{{ route('single-product', $pro->slug) }}">{{ $pro->title }}</a></li>
                                @endforeach

                                <li><a href="{{ route('products') }}">All Products</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </li>
            <li>
                <a href="{{ route('about') }}">About Us</a>
            </li>
            <li>
                <a href="{{ route('blog') }}">Blog</a>
            </li>
            <li>
                <a href="{{ route('contact') }}">Contact Us</a>
            </li>
        </ul>
    </nav>
    <span class="divider"></span>
</div>
