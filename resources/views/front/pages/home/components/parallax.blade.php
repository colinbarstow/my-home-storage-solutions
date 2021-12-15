@if($page->hasActiveParallax())
    <section class="banner parallax" data-option="{'offset': 0}" data-image-src="{{ \Illuminate\Support\Facades\Storage::url($parallax->image) }}" style="background-color: #44352d;">
        <div class="container banner-content appear-animate text-center" data-animation-options="{
                            'name': 'blurIn',
                            'delay': '.3s'
                        }">
            <h3 class="banner-subtitle text-white font-weight-bold mb-2"><span
                    class="label-star bg-primary text-uppercase text-white ml-2 mr-2">{{ $parallax->pre_title }}</h3>
            <h2 class="banner-title font-weight-bold text-uppercase text-white mb-2">{{ $parallax->title }}</h2>
            <p class="font-primary text-white mb-6">{{ $parallax->sub_title }}</p>
            <a href="{{ $parallax->link }}" class="btn btn-solid pl-5 pr-5">{{ $parallax->button_text }}</a>
        </div>
    </section>
@endif
