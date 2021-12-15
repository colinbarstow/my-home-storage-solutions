@if($page->show_blog)
    <section class="grey-section pt-10 pb-5">
        <div class="container mt-3 mb-4">
            <h2 class="title">Latest Blog</h2>
            <div class="owl-carousel owl-theme row cols-md-2 cols-1" data-owl-options="{'items': 2,'nav': false,'dots': true,'loop': false,'margin': 20,'responsive': {'0': {'items': 1},'768': {'items': 2,'dots': false}}}">
                @foreach($blogs as $key => $blog)
                    <div class="post post-list overlay-dark overlay-zoom appear-animate" data-animation-options="{'name': 'fadeInRightShorter', 'delay': '.3s'}">
                        <figure class="post-media">
                            <a href="{{ route('single-blog', $blog->slug) }}">
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($blog->image) }}" width="280" height="206" alt="post" />
                            </a>
                            <div class="post-calendar">
                                <span class="post-day">{{ \Carbon\Carbon::parse($blog->created_at)->format('d') }}</span>
                                <span class="post-month">{{ \Carbon\Carbon::parse($blog->created_at)->format('M') }}</span>
                            </div>
                        </figure>
                        <div class="post-details">
                            <h4 class="post-title"><a href="{{ route('single-blog', $blog->slug) }}">{{ $blog->title }}</a>
                            </h4>
                            <p class="post-content">{{ strip_tags(substr($blog->description, 0,100)) }}</p>
                            <a href="{{ route('single-blog', $blog->slug) }}"
                               class="btn btn-outline btn-md btn-dark btn-icon-right">Read More<i
                                    class="d-icon-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
