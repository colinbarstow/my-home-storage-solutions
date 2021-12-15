{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">{{ $page_title }}</h3>
        </div>
        <!--begin::Form-->
        <form method="POST" action="{{ route('admin.parallax.update', $parallax->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <input type="hidden" name="parallax_id" value="{{ $parallax->id }}">
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-2 col-form-label">Pre Title</label>
                    <div class="col-10">
                        <input class="form-control" name="pre_title" type="text" placeholder="Parallax Pre Title" value="{{ old('pre_title', $parallax->pre_title) }}">
                        @error('pre_title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">Title</label>
                    <div class="col-10">
                        <input class="form-control" name="title" type="text" placeholder="Parallax Title" value="{{ old('title',$parallax->title) }}">
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">Sub Title</label>
                    <div class="col-10">
                        <input class="form-control" name="sub_title" type="text" placeholder="Parallax Sub Title" value="{{ old('sub_title', $parallax->sub_title) }}">
                        @error('sub_title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">Button URL</label>
                    <div class="col-10">
                        <input class="form-control" name="button_text" type="text" placeholder="Parallax button text" value="{{ old('button_text', $parallax->button_text) }}">
                        @error('button_text')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">Button Text</label>
                    <div class="col-10">
                        <input class="form-control" name="link" type="text" placeholder="Parallax button URL" value="{{ old('link', $parallax->link) }}">
                        @error('link')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">Image</label>
                    <div></div>
                    <div class="col-10">
                        <input name="image" type="file" class="form-control" id="product_category_image">
                        <img id="parallax_image_display" style="margin-top: 30px;" src="{{ old('image', \Illuminate\Support\Facades\Storage::url($parallax->image)) }}" width="300px">
                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">Page</label>
                    <div class="col-10">
                        <select class="form-control" name="home_page_id">
                            <option selected disabled>Select a page</option>
                            @foreach($pages as $p)
                                <option value="{{ $p->id }}" @if($parallax->home_page_id == $p->id) selected @endif>{{ $p->page_title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">Make Parallax active for page?</label>
                    <div class="col-10 col-form-label">
                        <div class="checkbox-inline">
                            <label class="checkbox">
                                <input type="checkbox" name="active" {{ old('active') == 'on' || $parallax->active == true ? 'checked' : '' }}>
                                <span></span>Active</label>
                        </div>
                        <span class="form-text text-muted">If checked, this parallax will become your live parallax on the selected page</span>
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



@endsection

{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection

