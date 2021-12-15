{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    @if(Auth::user()->hasPermissionTo('create products'))
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">{{ $page_title }}</h3>
        </div>
        <!--begin::Form-->
        <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-2 col-form-label">Title</label>
                    <div class="col-10">
                        <input class="form-control" name="title" type="text" placeholder="Product Title" value="{{ old('title') }}">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">Meta Description</label>
                    <div class="col-10">
                        <input class="form-control" name="meta_description" type="text" placeholder="Meta Description" value="{{ old('meta_description') }}">
                        @error('meta_description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">Price</label>
                    <div class="col-10">
                        <input class="form-control" name="price" type="number" step=".01" placeholder="Product Price" value="{{ old('price') }}">
                        @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">Product Category</label>
                    <div class="col-10">
                        <select class="form-control" name="product_category_id">
                            <option selected disabled>Select a product Category</option>
                            @foreach($productCategories as $p)
                                <option @if(old('product_category_id') == $p->id) selected @endif value="{{ $p->id }}">{{ $p->title }}</option>
                            @endforeach
                        </select>
                        @error('product_category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">Shipping info template</label>
                    <div class="col-10">
                        <select class="form-control" name="shipping_id">
                            <option selected disabled>Select a shipping template</option>
                            @foreach($shippings as $shipping)
                                <option @if(old('shipping_id') == $p->id) selected @endif value="{{ $shipping->id }}">{{ $shipping->carrier }} - {{ $shipping->delivery_time }}</option>
                            @endforeach
                        </select>
                        @error('shipping_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">Short Description</label>
                    <div class="col-10">
                        <input class="form-control" name="short_description" type="text" placeholder="Short Description" value="{{ old('short_description') }}">
                        @error('short_description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label"> Description  </label>
                    <div class="col-10">
                        <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label"> Additional  </label>
                    <div class="col-10">
                        <textarea class="form-control" id="additional" name="additional">{{ old('additional') }}</textarea>
                        @error('additional')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">Make Product active?</label>
                    <div class="col-10 col-form-label">
                        <div class="checkbox-inline">
                            <label class="checkbox">
                                <input type="checkbox" name="active" {{ old('active') == 'on' ? 'checked' : '' }}>
                                <span></span>Active</label>
                        </div>
                        <span class="form-text text-muted">If checked, this product will be live on your website</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Feature Product</label>
                    <div class="col-10 col-form-label">
                        <div class="checkbox-inline">
                            <label class="checkbox">
                                <input type="checkbox"  name="featured" {{ old('featured') == 'on' ? 'checked' : '' }}>
                                <span></span>Feature Product?</label>
                        </div>
                        <span class="form-text text-muted">If checked, this product will be featured in your featured products sections</span>
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
                <h3 class="card-title">You do not have permission to create products please contact a system admin if you require access</h3>
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
        CKEDITOR.replace( 'additional', {
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

@endsection
