{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    @if(Auth::user()->hasPermissionTo('create admin users'))
        <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">{{ $page_title }}</h3>
        </div>
        <!--begin::Form-->
        <form method="POST" action="{{ route('admin.admin-users.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-2 col-form-label">First Name</label>
                    <div class="col-10">
                        <input class="form-control" name="first_name" type="text" placeholder="First Name" value="{{ old('first_name') }}">
                        @error('first_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Last Name</label>
                    <div class="col-10">
                        <input class="form-control" name="last_name" type="text" placeholder="Last Name" value="{{ old('last_name') }}">
                        @error('last_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Email</label>
                    <div class="col-10">
                        <input class="form-control" name="email" type="text" placeholder="Email" value="{{ old('email') }}">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Job Title</label>
                    <div class="col-10">
                        <input class="form-control" name="job_title" type="text" placeholder="Job Title" value="{{ old('job_title') }}">
                        @error('job_title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">User Role</label>
                    <div class="col-9 col-form-label">
                        <div class="radio-inline">
                            @foreach($roles as $role)
                            <label class="radio">
                                <input type="radio" name="role" value="{{ $role->id }}">
                                <span></span>{{ $role->name }}</label>
                            @endforeach
                        </div>
                        <span class="form-text text-muted">Select a role for the new Admin User</span>
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
                <h3 class="card-title">You do not have permission to create admin users please contact a system admin if you require access</h3>
            </div>
        </div>
    @endif



@endsection


@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection


