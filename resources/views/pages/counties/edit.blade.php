{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    @if(Auth::user()->hasPermissionTo('edit counties'))
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">{{ $page_title }}</h3>
            </div>
            <!--begin::Form-->
            <form method="POST" action="{{ route('admin.counties.update', $county->id) }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                <input type="hidden" name="blog_id" value="{{ $county->id }}">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-2 col-form-label">County</label>
                        <div class="col-10">
                            <input class="form-control" name="name" type="text" placeholder="County" value="{{ old('name', $county->name) }}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Price</label>
                        <div class="col-10">
                            <input class="form-control" name="price" step=".01" type="number" placeholder="Price" value="{{ old('price', $county->price/100) }}">
                            @error('price')
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
                            <a href="{{ route('admin.counties.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @else
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">You do not have permission to edit counties please contact a system admin</h3>
            </div>
        </div>
    @endif


@endsection

{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection


