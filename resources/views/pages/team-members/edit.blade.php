{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    @if(Auth::user()->hasPermissionTo('edit teams'))
        <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">{{ $page_title }}</h3>
        </div>
        <!--begin::Form-->
        <form method="POST" action="{{ route('admin.update-team-member', $team) }}" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-2 col-form-label">Name</label>
                    <div class="col-10">
                        <input class="form-control" name="name" type="text" placeholder="Team member Name" value="{{ old('name', $team->name) }}">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Job</label>
                    <div class="col-10">
                        <input class="form-control" name="job" type="text" placeholder="Team member job" value="{{ old('job', $team->job) }}">
                        @error('job')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Image</label>
                    <div></div>
                    <div class="col-10">
                        <input name="image" type="file" class="form-control" id="product_category_image">
                        <img id="product_category_image_display" style="margin-top: 30px;" src="{{ old('image', \Illuminate\Support\Facades\Storage::url($team->image)) }}" width="300px">
                        @error('image')
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
                    </div>
                </div>
            </div>
        </form>
    </div>
    @else
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">You do not have permission to edit team members please contact a system admin if you require access</h3>
            </div>
        </div>
    @endif


@endsection

{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection


