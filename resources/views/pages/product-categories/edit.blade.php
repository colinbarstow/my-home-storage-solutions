{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    @if(Auth::user()->hasPermissionTo('edit product categories'))
        <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">{{ $page_title }}</h3>
        </div>
        <!--begin::Form-->
        <form method="POST" action="{{ route('admin.product-categories.update', $productCategory->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <input type="hidden" name="product_category_id" value="{{ $productCategory->id }}">
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-2 col-form-label">Title</label>
                    <div class="col-10">
                        <input class="form-control" name="title" type="text" placeholder="Product Category Title" value="{{ old('title', $productCategory->title) }}">
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">Meta Description</label>
                    <div class="col-10">
                        <input class="form-control" name="meta_description" type="text" placeholder="Meta Description" value="{{ old('meta_description', $productCategory->meta_description) }}">
                        @error('meta_description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">Image</label>
                    <div></div>
                    <div class="col-10">
                        <input name="image" type="file" class="form-control" id="product_category_image">
                        <img id="product_category_image_display" style="margin-top: 30px;" src="{{ old('image', \Illuminate\Support\Facades\Storage::url($productCategory->image)) }}" width="300px">
                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label"> Description  </label>
                    <div class="col-10">
                        <textarea class="form-control" id="description" name="description">{{ old('description', $productCategory->description) }}</textarea>
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Make Product Category active?</label>
                    <div class="col-10 col-form-label">
                        <div class="checkbox-inline">
                            <label class="checkbox">
                                <input type="checkbox" name="active" {{ old('active') == 'on' || $productCategory->active == true ? 'checked' : '' }}>
                                <span></span>Active</label>
                        </div>
                        <span class="form-text text-muted">If checked, this product category will be live on your website</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Feature Product Category</label>
                    <div class="col-10 col-form-label">
                        <div class="checkbox-inline">
                            <label class="checkbox">
                                <input type="checkbox"  name="featured" {{ old('featured') == 'on' || $productCategory->featured == true ? 'checked' : '' }}>
                                <span></span>Feature Product Category</label>
                        </div>
                        <span class="form-text text-muted">If checked, this product category will be featured in your featured product categories sections</span>
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
                <h3 class="card-title">You do not have permission to edit product categories please contact a system admin if you require access</h3>
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
        CKEDITOR.replace( 'description', {
            filebrowserUploadUrl: "{{route('admin.product-categories.ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>

    <script>

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#product_category_image_display').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string

                $('#product_category_image_display').show();
            }
        }

        $("#product_category_image").change(function() {
            readURL(this);
        });

    </script>


    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
@endsection
