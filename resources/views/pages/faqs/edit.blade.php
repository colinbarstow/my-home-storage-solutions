{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    @if(Auth::user()->hasPermissionTo('edit faqs'))
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">{{ $page_title }}</h3>
            </div>
            <!--begin::Form-->
            <form method="POST" action="{{ route('admin.faqs.update', $faq->id) }}">
                @csrf
                {{ method_field('PATCH') }}
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Question</label>
                        <div class="col-10">
                            <input class="form-control" name="question" type="text" placeholder="Question" value="{{ old('question', $faq->question) }}">
                            @error('question')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label"> Answer </label>
                        <div class="col-10">
                            <textarea class="form-control" id="body" name="answer">{{ old('answer', $faq->answer) }}</textarea>
                            @error('answer')
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
                <h3 class="card-title">You do not have permission to edit faqs please contact a system admin</h3>
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
