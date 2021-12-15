{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    @if(Auth::user()->hasPermissionTo('edit products'))
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">{{ $page_title }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-10" style="text-align:center; margin-bottom: 20px">
                    <h3>Product Images</h3>
                    <p>Use the dropzone below to drag and drop your product images. Once you have added images they will appear below the drop zone, where you can manage them.</p>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-2 col-form-label">Product Images</div>
                <div class="col-10">
                    <form action="{{ route('admin.product-images.store') }}" id="filedrop" enctype="multipart/form-data" method="POST" class="dropzone">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                    </form>
                </div>
            </div>

            <div class="form-group row">

                <div class="col-2 col-form-label">Existing Product Images</div>

                <div class="col-10">

                    <form action="{{ route('admin.product-images.update', $product->id) }}" method="POST">

                        @csrf

                        {{ method_field('PATCH') }}

                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <div class="row" id="finished_uploads">

                            @foreach($product->images as $image)

                                @include('pages.products.components.individual-image')

                            @endforeach

                        </div>

                        <div class="form-group row" style="margin-top:15px">

                            <div class="col-10">

                                <button type="submit" class="btn btn-success mr-2">Save Changes to images</button>

                            </div>


                        </div>


                    </form>

                </div>

            </div>

        </div>
        <hr>
        <!--begin::Form-->

        <div class="card-body">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-10" style="text-align:center; margin-bottom: 20px">
                    <h3>Product Details</h3>
                </div>
            </div>
            <form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="form-group row">
                <label class="col-2 col-form-label">Title</label>
                <div class="col-10">
                    <input class="form-control" name="title" type="text" placeholder="Product Title" value="{{ old('title', $product->title) }}">
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">Meta Description</label>
                    <div class="col-10">
                        <input class="form-control" name="meta_description" type="text" placeholder="Meta Description" value="{{ old('meta_description', $product->meta_description) }}">
                        @error('meta_description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">Price</label>
                    <div class="col-10">
                        <input class="form-control" name="price" type="number" step=".01" placeholder="Product Price" value="{{ old('price', $product->price/100) }}">
                        @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">Product Category</label>
                    <div class="col-10">
                        <select class="form-control" name="product_category_id">
                            @foreach($productCategories as $p)
                                <option value="{{ $p->id }}" @if($product->product_category->id == $p->id) selected @endif>{{ $p->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">Shipping info template</label>
                    <div class="col-10">
                        <select class="form-control" name="shipping_id">
                            <option selected disabled>Select a shipping template</option>
                            @foreach($shippings as $shipping)
                                <option value="{{ $shipping->id }}" @if($product->shipping->id == $shipping->id) selected @endif>{{ $shipping->carrier }} - {{ $shipping->delivery_time }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">Short Description</label>
                    <div class="col-10">
                        <input class="form-control" name="short_description" type="text" placeholder="Short Description" value="{{ old('short_description', $product->short_description) }}">
                        @error('short_description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label"> Description  </label>
                    <div class="col-10">
                        <textarea class="form-control" id="description" name="description">{{ old('description', $product->description) }}</textarea>
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label"> Additional  </label>
                    <div class="col-10">
                        <textarea class="form-control" id="additional" name="additional">{{ old('additional', $product->additional) }}</textarea>
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
                                <input type="checkbox" name="active" {{ old('active') == 'on' || $product->active == true ? 'checked' : '' }}>
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
                                <input type="checkbox"  name="featured" {{ old('featured') == 'on' || $product->featured == true ? 'checked' : '' }}>
                                <span></span>Feature Product Category</label>
                        </div>
                        <span class="form-text text-muted">If checked, this product will be featured in your featured products sections</span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-2"></div>
                    <div class="col-10">
                        <button type="submit" class="btn btn-success mr-2">Save changes to product details</button>
                    </div>
                </div>
            </form>
        </div>

        <hr>

        <div class="card-body">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-10" style="text-align:center; margin-bottom: 20px">
                    <h3>User Defined Product Attributes</h3>
                </div>
            </div>
            <form method="POST" action="{{ route('admin.product-attributes.store') }}">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="form-group row">
                    <label class="col-2 col-form-label">Attribute Name</label>
                    <div class="col-10">
                        <input class="form-control" name="title" type="text" placeholder="Attribute Name" value="{{ old('title') }}">
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Attribute Type</label>
                    <div class="col-10">
                        <select class="form-control" name="type">
                            <option value="text">Text - e.g. Attribute Value 123 </option>
                            <option value="number">Number - e.g. 123 or 123.56 </option>
                            <option value="textarea">Text area - (Large box to input large amounts of details)</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Attribute is a measurement</label>
                    <div class="col-10 col-form-label">
                        <div class="checkbox-inline">
                            <label class="checkbox">
                                <input type="checkbox" name="measurement" {{ old('measurement') == 'on' ? 'checked' : '' }}>
                                <span></span>Define as measurement</label>
                        </div>
                        <span class="form-text text-muted">If checked, this attribute will display with your defined measurement type</span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-2"></div>
                    <div class="col-10">
                        <button type="submit" class="btn btn-success mr-2">Create Attribute</button>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-10" style="text-align: center">
                    @if($product->attributes->count() > 0)
                        <h3>Existing Attributes</h3>
                        <div class="row">
                            @foreach($product->attributes as $attribute)
                            <div class="col-2" style="margin: 20px; border: 1px solid rgba(0,0,0,0.1); padding: 5px; max-height: 200px">
                                <h3>{{ $attribute->title }}</h3>
                                <p>Attribute Type: {{ $attribute->type }}</p>
                                <p>{{ $attribute->isAMeasurementAsString() }}</p>
                                <form action="{{ route('admin.product-attributes.destroy', $attribute->id) }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                            @endforeach

                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
    @else
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">You do not have permission to edit products please contact a system admin if you require access</h3>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/basic.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>
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
        Dropzone.options.filedrop = {
            init: function () {
                this.on("success", function (file, response) {
                    addToList(response);
                });
            }
        };
        function addToList(response)
        {
            let block = $('#finished_uploads');

            let mainSelector;

            if(response.main === true){
                mainSelector = '<input type="radio" name="main" value="' + response.id + '" checked="checked">';
            } else {
                mainSelector = '<input type="radio" name="main" value="' + response.id + '">';
            }

            block.append('<div class="col-2" style="margin: 20px; border: 1px solid rgba(0,0,0,0.1); padding: 5px; max-height: 400px">' +
                '<div style="text-align: center; height: 200px;">' +
                '<img src="' + response.image + '" width="100%" style="margin-bottom: 15px">' +
                '</div>' +
                '<div>' +
                '<div class="form-group row" style="margin-bottom: 0px">' +
                '<div class="col-12 col-form-label">' +
                '<div class="radio-inline">' +
                '<label class="radio">' + mainSelector + '<span></span>Main Image</label>' +
                '</div>' +
                '<span class="form-text text-muted" style="font-size: 10px">If set as main, this image will be your products main image</span>' +
                '</div>' +
                '</div>' +
                '<div class="form-group row" style="margin-bottom: 0px">' +
                '<div class="col-10 col-form-label">' +
                '<div class="checkbox-inline">' +
                '<label class="checkbox">' +
                '<input type="checkbox" name="delete[' + response.id + ']">' +
                '<span></span>Delete</label>' +
                '</div>' +
                '<span class="form-text" style="font-size: 10px; color:red">If checked, this image will be deleted</span>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>')
        }
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
