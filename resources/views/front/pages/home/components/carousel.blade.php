<div style=height:85vh;" class="owl-carousel owl-theme row owl-dot-inner owl-dot-white intro-slider animation-slider cols-1 gutter-no"
     data-owl-options="{
                        'nav': false,
                        'dots': true,
                        'loop': true,
                        'items': 1,
                        'autoplay': true,
                        'autoplayTimeout': 8000
                    }">
    @foreach($page->carouselImages()->where('active', true)->get() as $ci)
        <div class="banner banner-fixed video-banner intro-slide3" style="height: 85vh; background-color: #dddee0;">
            <figure>
                <div style="background-image: url('{{ \Illuminate\Support\Facades\Storage::url($ci->image) }}');
                    background-size: cover;
                    background-repeat: no-repeat;
                    background-position: center;
                    width: 100%;
                    height: 100vh;"
                ></div>
            </figure>
            <div class="container">
                <div class="banner-content x-50 y-50 text-center">
                    @if($ci->sub_title !== null)
                        <h4 style="color: {{ $ci->text_colour }}" class="banner-subtitle text-uppercase mb-3 slide-animate"
                            data-animation-options="{'name': 'fadeIn', 'duration': '.7s'}">{{ $ci->sub_title }}</h4>
                    @endif
                    @if($ci->title !== null)
                        <h2 style="color: {{ $ci->text_colour }}" class="banner-title mb-3 font-weight-bold ls-m slide-animate"
                            data-animation-options="{'name': 'fadeInUp', 'duration': '.7s', 'delay': '.5s'}">{{ $ci->title }}</h2>
                    @endif
                    @if($ci->text !== null)
                        <p style="color: {{ $ci->text_colour }}" class="slide-animate mb-5 ls-s font-primary "
                           data-animation-options="{'name': 'fadeInUp', 'duration': '1s', 'delay': '.8s'}">{{ $ci->text }}</p>
                    @endif
                    @if($ci->button_url !== null)
                        <a style="color: {{ $ci->text_colour }}" target="_blank" href="{{ $ci->button_url }}" class="btn btn-outline btn-white slide-animate mr-3 mb-1"
                           data-animation-options="{'name': 'fadeInLeft', 'duration': '1s', 'delay': '1.5s'}">{{ $ci->button_text }}</a>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>
