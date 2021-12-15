{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    @if(Auth::user()->hasPermissionTo('create carousel'))
        <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">{{ $page_title }}</h3>
        </div>
        <!--begin::Form-->
        <form method="POST" action="{{ route('admin.home-page-carousel-image.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
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
                    <label class="col-2 col-form-label">Title</label>
                    <div class="col-10">
                        <input class="form-control" name="title" type="text" placeholder="Carousel Title" value="{{ old('title') }}">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">Subtitle</label>
                    <div class="col-10">
                        <input class="form-control" name="sub_title" type="text" placeholder="Carousel subtitle" value="{{ old('sub_title') }}">
                        @error('sub_title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">text</label>
                    <div class="col-10">
                        <input class="form-control" name="text" type="text" placeholder="Carousel text" value="{{ old('text') }}">
                        @error('text')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">Button text</label>
                    <div class="col-10">
                        <input class="form-control" name="button_text" type="text" placeholder="Carousel button text" value="{{ old('button_text') }}">
                        @error('button_text')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">Button url</label>
                    <div class="col-10">
                        <input class="form-control" name="button_url" type="text" placeholder="Carousel button url" value="{{ old('button_url') }}">
                        @error('button_url')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">Text Colour</label>
                    <div class="col-10">
                        <input class="form-control" name="text_colour" type="text" placeholder="Carousel text colour" value="{{ old('text_colour') }}">
                        @error('text_colour')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">Make Carousel Image active?</label>
                    <div class="col-10 col-form-label">
                        <div class="checkbox-inline">
                            <label class="checkbox">
                                <input type="checkbox" name="active" {{ old('active') == 'on' ? 'checked' : '' }}>
                                <span></span>Active</label>
                        </div>
                        <span class="form-text text-muted">If checked, this carousel image will be live on your website</span>
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
                <h3 class="card-title">You do not have permission to create carousel imagees please contact a system admin if you require access</h3>
            </div>
        </div>
    @endif


@endsection

{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection


