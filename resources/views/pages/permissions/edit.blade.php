{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    @if(Auth::user()->hasPermissionTo('edit permissions'))
        <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">{{ $page_title }}</h3>
        </div>
        <!--begin::Form-->
        <form method="POST" action="{{ route('admin.permissions.update', $permission) }}" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            <input type="hidden" name="permission_id" value="{{ $permission->id }}">
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-2 col-form-label">Permission Name</label>
                    <div class="col-10">
                        <input class="form-control" name="name" type="text" placeholder="Role Name" value="{{ old('name', $permission->name) }}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-12">
                        <h4>Roles</h4>
                    </div>
                </div>
                @foreach($roles as $role)
                    <div class="form-group row">
                        <label class="col-2 col-form-label">{{ $role->name }}</label>
                        <div class="col-10 col-form-label">
                            <div class="checkbox-inline">
                                <label class="checkbox"></label>
                                <input type="checkbox" name="roles[{{ $role->id }}]" {{ old('roles[' . $role->id .']') == 'on' || $permission->hasRole($role->name) ? 'checked' : '' }}>
                                <span></span>{{ $role->name }}</label>
                            </div>
                            <span class="form-text text-muted">Check to apply permission to role</span>
                        </div>
                    </div>
                @endforeach
                @error('roles')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-10">
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @endif
@endsection

{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection


{{-- Scripts Section --}}
@section('scripts')

@endsection
