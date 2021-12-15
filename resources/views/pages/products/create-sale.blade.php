{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    @if(Auth::user()->hasPermissionTo('sale products'))
        <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">{{ $page_title }}</h3>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-10" style="text-align:center; margin-bottom: 20px">
                    <h3>Product Details</h3>
                </div>
            </div>
            <form method="POST" action="{{ route('admin.products.update-sale', $product->id) }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                <input type="hidden" name="product_id" value="{{ $product->id }}">


                <div class="form-group row">
                    <label class="col-2 col-form-label">Sale Price</label>
                    <div class="col-10">
                        <input class="form-control" name="sale_price" type="number" step=".01" placeholder="Product Sale Price" value="{{ old('sale_price', $product->sale_price/100) }}">
                        @error('sale_price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-2"></div>
                    <div class="col-10">
                        <button type="submit" class="btn btn-success mr-2">Save changes to products sale price</button>
                    </div>
                </div>
            </form>
        </div>

        <hr>


    </div>
    @else
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">You do not have permission to view product sales please contact a system admin if you require access</h3>
            </div>
        </div>
    @endif


@endsection

{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection

