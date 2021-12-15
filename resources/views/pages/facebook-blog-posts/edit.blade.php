{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    @if(Auth::user()->hasPermissionTo('edit facebook blog posts'))
        <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">{{ $page_title }}</h3>
        </div>
        <!--begin::Form-->
        <form method="POST" action="{{ route('admin.facebook-posts.update', $blog->facebookPost->id) }}" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            <div class="card-body">
                <div class="form-group row">
                    <p>You can only edit the facebook scheduled time from this page, to edit the entire blog post <a
                            href="{{ route('admin.blogs.edit', $blog->id) }}">click here</a></p>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Title</label>
                    <div class="col-10">
                        <input class="form-control" disabled name="title" type="text" placeholder="Blog Post Title" value="{{ old('title', $blog->title) }}">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Image</label>
                    <div></div>
                    <div class="col-10">
                        <input name="image" disabled type="file" class="form-control" id="blog_image">
                        <img id="blog_image_display" style="margin-top: 30px;" src="{{ old('image', \Illuminate\Support\Facades\Storage::url($blog->image)) }}" width="300px">
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label"> Body </label>
                    <div class="col-10">
                        <textarea disabled class="form-control" id="body" name="blog_content">{{ old('blog_content', $blog->content) }}</textarea>
                        @error('blog_content')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Make Blog post active?</label>
                    <div class="col-10 col-form-label">
                        <div class="checkbox-inline">
                            <label class="checkbox">
                                <input disabled type="checkbox" name="active" {{ old('active', $blog->active) == 'on' ? 'checked' : '' }}>
                                <span></span>Active</label>
                        </div>
                        <span class="form-text text-muted">If checked, this blog post will be live on your website</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Feature Post</label>
                    <div class="col-10 col-form-label">
                        <div class="checkbox-inline">
                            <label class="checkbox">
                                <input disabled type="checkbox"  name="featured" {{ old('featured', $blog->featured) == 'on' ? 'checked' : '' }}>
                                <span></span>Feature Post</label>
                        </div>
                        <span class="form-text text-muted">If checked, this blog will be featured in your featured blogs sections</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">Post to facebook</label>
                    <div class="col-10 col-form-label">
                        <div class="checkbox-inline">
                            <label class="checkbox">
                                <input disabled type="checkbox"  name="post_to_facebook" id="post_to_facebook" {{ old('post_to_facebook') == 'on' || $blog->facebookPost == true ? 'checked' : '' }}>
                                <span></span>Post to facebook</label>
                        </div>
                        <span class="form-text text-muted">If already checked, and subsequently unchecked and if the facebook post has already been posted it will be deleted from Facebook.</span>
                    </div>
                </div>

                <div class="form-group row" id="facebook_time_block">
                    <label class="col-2 col-form-label">Scheduled time to post on Facebook</label>
                    <div class="col-10">
                        <input class="form-control" name="scheduled_time" type="datetime-local"  value="{{ old('scheduled_time', \Carbon\Carbon::parse($blog->facebookPost->scheduled_time)->format('Y-m-d\TH:i:s'))}}">
                        @error('scheduled_time')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-10">
                        <button type="submit" class="btn btn-success mr-2">Update</button>
                        <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @else
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">You do not have permission to edit Facebook blog posts please contact a system admin if you require access</h3>
            </div>
        </div>
    @endif


@endsection

{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection


{{-- Scripts Section --}}
@section('scripts')
    {{-- vendors --}}
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'body', {
            filebrowserUploadUrl: "{{route('admin.blogs.ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>

    <script>
        <!--
        if(!Modernizr.inputtypes['datetime-local']) {
            $('input[type=datetime-local]').datetimepicker();
        }
        -->
    </script>

@endsection
