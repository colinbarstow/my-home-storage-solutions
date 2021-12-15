{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    @if(Auth::user()->hasPermissionTo('create blog posts'))
        <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">{{ $page_title }}</h3>
        </div>
        <!--begin::Form-->
        <form method="POST" action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-2 col-form-label">Title</label>
                    <div class="col-10">
                        <input class="form-control" name="title" type="text" placeholder="Blog Post Title" value="{{ old('title') }}">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Category</label>
                    <div class="col-10">
                        <select class="form-control" name="blog_category_id">
                            <option selected disabled>Select a category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if(old('blog_category_id') == $category->id) selected @endif>{{ $category->title }}</option>
                            @endforeach
                        </select>
                        @error('blog_category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Image</label>
                    <div></div>
                    <div class="col-10">
                        <input name="image" type="file" class="form-control" id="blog_image">
                        <img id="blog_image_display" style="margin-top: 30px; display: none" src="{{ old('image') }}" width="300px">
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label"> Body </label>
                    <div class="col-10">
                        <textarea class="form-control" id="body" name="blog_content">{{ old('blog_content') }}</textarea>
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
                                <input type="checkbox" name="active" {{ old('active') == 'on' ? 'checked' : '' }}>
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
                                <input type="checkbox"  name="featured" {{ old('featured') == 'on' ? 'checked' : '' }}>
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
                                <input type="checkbox"  name="post_to_facebook" id="post_to_facebook" {{ old('post_to_facebook') == 'on' ? 'checked' : '' }}>
                                <span></span>Post to facebook</label>
                        </div>
                        <span class="form-text text-muted">If checked, this blog post will be posted to your facebook page</span>
                    </div>
                </div>
                <div class="form-group row" id="facebook_time_block" style="display: none">
                    <label class="col-2 col-form-label">Scheduled time to post on Facebook</label>
                    <div class="col-10">
                        <input class="form-control" name="scheduled_time" type="datetime-local"  value="{{ old('scheduled_time') }}">
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
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @else
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">You do not have permission to create blog posts please contact a system admin if you require access</h3>
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
        $('#post_to_facebook').change(function() {
            if(this.checked) {
                $('#facebook_time_block').show();
            } else {
                $('#facebook_time_block').hide();
            }
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blog_image_display').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string

                $('#blog_image_display').show();
            }
        }

        $("#blog_image").change(function() {
            readURL(this);
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
