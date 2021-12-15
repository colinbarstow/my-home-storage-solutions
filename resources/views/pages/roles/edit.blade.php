{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    @if(Auth::user()->hasPermissionTo('edit roles'))
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">{{ $page_title }}</h3>
        </div>
        <!--begin::Form-->
        <form method="POST" action="{{ route('admin.roles.update', $role) }}" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-2 col-form-label">Role Name</label>
                    <div class="col-10">
                        <input class="form-control" name="name" type="text" placeholder="Role Name" value="{{ old('name', $role->name) }}">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Permissions</label>
                    <div class="col-10">
                        <p class="text-muted">Permissions are assigned to roles when a permission is created.</p>
                        <br>
                        <p>Currently Assigned Permissions</p>
                        <ul>
                            @foreach($role->permissions as $permission)
                                <li><a href="{{ route('admin.permissions.edit', $permission->id) }}" target="_blank">{{ $permission->name }}</a></li>
                            @endforeach
                        </ul>
                        <br>
                        <p>To remove a permission it must be done from the permission edit page.</p>
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
    @endif


@endsection

{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection


{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
@endsection
