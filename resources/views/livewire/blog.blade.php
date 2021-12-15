<div>
    <div class="container">
        <div class="row gutter-lg">
            <div class="col-lg-9">
                <div class="posts">
                    @foreach($this->blogs as $blog)
                        <article class="post post-lg mb-9">
                            <figure class="post-media">
                                <a href="{{ route('single-blog', $blog->slug) }}">
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($blog->image) }}" width="870" height="420" alt="post" />
                                </a>
                            </figure>
                            <div class="post-details">
                                <div class="post-meta">
                                    <a href="#" class="post-author">by {{ $blog->authorName() ?? $details->website_name }}</a>
                                    |
                                    <a href="#" class="post-date">{{ \Carbon\Carbon::parse($blog->created_at)->toFormattedDateString() }}</a>
                                    |
                                    <a href="#" class="post-comment">{{ $blog->comments->count() }} Comments</a>
                                </div>
                                <h4 class="post-title"><a href="{{ route('single-blog', $blog->slug) }}">{{ $blog->title }}</a>
                                </h4>
                                <div class="post-cats">
                                    in <a wire:click="switchCategory({{ $blog->category->id }})" href="javascript:void(0)">{{ $blog->category->title }}</a>
                                </div>
                                <a href="{{ route('single-blog', $blog->slug) }}"
                                   class="btn btn-link btn-underline btn-primary btn-reveal-right">Read more<i
                                        class="d-icon-arrow-right"></i></a>
                            </div>
                        </article>
                    @endforeach
                </div>
{{--                <ul class="pagination mb-10 pb-4">--}}
{{--                    <li class="page-item disabled">--}}
{{--                        <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1"--}}
{{--                           aria-disabled="true">--}}
{{--                            <i class="d-icon-arrow-left"></i>Prev--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a>--}}
{{--                    </li>--}}
{{--                    <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                    <li class="page-item">--}}
{{--                        <a class="page-link page-link-next" href="#" aria-label="Next">--}}
{{--                            Next<i class="d-icon-arrow-right"></i>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
            </div>
            <aside class="col-lg-3 right-sidebar blog-sidebar sidebar-fixed sticky-sidebar-wrapper">
                <div class="sidebar-overlay">
                    <a class="sidebar-close" href="#"><i class="d-icon-times"></i></a>
                </div>
                <a href="#" class="sidebar-toggle"><i class="fas fa-chevron-left"></i></a>
                <div class="sidebar-content">
                    <div class="sticky-sidebar" data-sticky-options="{'top': 89, 'bottom': 70}">
                        <div class="widget widget-categories">
                            <h3 class="widget-title">Blog Categories</h3>
                            <ul class="widget-body filter-items search-ul">
                                @foreach($this->categories as $category)
                                    <li><a href="javascript:void(0)" wire:click="switchCategory({{ $category->id }})">{{ $category->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget widget-posts mb-5">
                            <h3 class="widget-title">Popular Posts</h3>
                            <div class="widget-body">
                                <div class="post-col">
                                    @foreach($this->populars as $popular)
                                        <div class="post post-list-sm">
                                            <figure class="post-media">
                                                <a href="{{ route('single-blog', $popular->slug) }}">
                                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($popular->image) }}" width="100" height="100"
                                                         alt="post" />
                                                </a>
                                            </figure>
                                            <div class="post-details">
                                                <div class="post-meta">
                                                    <a href="#" class="post-date">{{ \Carbon\Carbon::parse($popular->created_at)->toFormattedDateString() }}</a>
                                                </div>
                                                <h4 class="post-title"><a href="{{ route('single-blog', $popular->slug) }}">{{ $popular->title }}</a></h4>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>
