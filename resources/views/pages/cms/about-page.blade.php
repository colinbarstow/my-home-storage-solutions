{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    @if(Auth::user()->hasPermissionTo('view cms'))
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">{{ $page_title }}</h3>
            </div>
            <!--begin::Form-->
            <form method="POST" action="{{ route('admin.about-page.update', $aboutPage->id) }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Show featured products block?</label>
                        <div class="col-10 col-form-label">
                            <div class="checkbox-inline">
                                <label class="checkbox">
                                    <input type="checkbox" name="show_featured_items" {{ old('show_featured_items') == 'on' || $aboutPage->show_featured_items == true ? 'checked' : '' }}>
                                    <span></span>Featured Products</label>
                            </div>
                            <span class="form-text text-muted">If checked, the featured products block will be displayed on your frontend homepage</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Show parallax block?</label>
                        <div class="col-10 col-form-label">
                            <div class="checkbox-inline">
                                <label class="checkbox">
                                    <input type="checkbox" name="show_parallax" {{ old('show_parallax') == 'on' || $aboutPage->show_parallax == true ? 'checked' : '' }}>
                                    <span></span>Parallax</label>
                            </div>
                            <span class="form-text text-muted">If checked, the parallax you create for the about page will be displayed on your frontend about page</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label"> Body </label>
                        <div class="col-10">
                            <textarea class="form-control" id="about_body" name="body">{{ old('body', $about->body) }}</textarea>
                            @error('body')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                @if(Auth::user()->hasPermissionTo('edit cms'))
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success mr-2">Update</button>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-12">
                                <p>You do not have permission to update the about page, please contact a system administrator if you require permission</p>
                            </div>
                        </div>
                    </div>
                @endif
            </form>
        </div>
    @else
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">You do not have permission to view the about page please contact a system admin if you require access</h3>
            </div>
        </div>
    @endif

    @if(Auth::user()->hasPermissionTo('view teams'))
        <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">Team members</h3>
        </div>
        <!--begin::Form-->

            <div class="card-body">
                <div class="row">
                    @foreach($teams as $team)
                        <div class="col-lg-4" style="text-align: center">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($team->image) }}" width="100%">
                            <p>{{ $team->name }}</p>
                            <p>{{ $team->job }}</p>
                            @if(Auth::user()->hasPermissionTo('edit teams'))
                            <a href="{{ route('admin.edit-team-member', $team) }}" class="btn btn-primary">Edit</a>
                            @endif
                            @if(Auth::user()->hasPermissionTo('delete teams'))
                            <a href="javascript:void(0)" onclick="event.preventDefault();document.getElementById('delete-form').submit()" class="btn btn-danger">Delete</a>

                            <form method="POST" id="delete-form" action="{{ route('admin.delete-team-member', $team) }}">
                                @csrf
                                {{ method_field('DELETE') }}
                            </form>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
            @if(Auth::user()->hasPermissionTo('create teams'))
            <div class="card-footer">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('admin.create-team-member') }}" type="submit" class="btn btn-success mr-2">Create new team member</a>
                    </div>
                </div>
            </div>
            @else
                <div class="card-footer">
                    <div class="row">
                        <div class="col-12">
                            <p>You do not have permission to create a team member, please contact a system administrator if you require permission</p>
                        </div>
                    </div>
                </div>
            @endif

    </div>
    @else
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">You do not have permission to view team members please contact a system admin if you require access</h3>
            </div>
        </div>
    @endif

@endsection

{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'about_body', {
            filebrowserUploadUrl: "{{route('admin.about.ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection


