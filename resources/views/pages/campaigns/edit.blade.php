{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    @if(Auth::user()->hasPermissionTo('edit campaigns'))
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">{{ $page_title }}</h3>
            </div>
            <!--begin::Form-->
            <form method="POST" action="{{ route('admin.campaigns.update', $campaign->id) }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Blog Post</label>
                        <div class="col-10">
                            <input class="form-control" disabled name="title" type="text" value="{{ $campaign->blog->title }}">
                            <span>This can not be changed. To create a campaign for a different blog please choose create a campaign from the blog itself</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Email subject</label>
                        <div class="col-10">
                            <input class="form-control" name="subject" type="text" value="{{ old('subject', $campaign->subject) }}">
                            @error('subject')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label"> Body </label>
                        <div class="col-10">
                            <textarea class="form-control" id="body" name="blog_content">{{ old('blog_content', $campaign->body) }}</textarea>
                            @error('blog_content')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row" id="facebook_time_block" >
                        <label class="col-2 col-form-label">Scheduled time to send campaign</label>
                        <div class="col-10">
                            <input class="form-control" name="scheduled" type="datetime-local"  value="{{ old('scheduled', $campaign->scheduled->format('Y-m-d\TH:i:s')) }}">
                            @error('scheduled')
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
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @else
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">You do not have permission to edit campaigns please contact a system admin if you require access</h3>
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
            filebrowserUploadUrl: "{{route('admin.campaigns.ckeditor.upload', ['_token' => csrf_token() ])}}",
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
