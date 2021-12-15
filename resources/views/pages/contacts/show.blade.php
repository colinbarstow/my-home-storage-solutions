{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    @if(Auth::user()->hasPermissionTo('view contacts'))
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">{{ $page_title }}</h3>
            </div>
            <!--begin::Form-->

            <div class="card-body">
                <div class="form-group row">
                    <label class="col-2 col-form-label">Name</label>
                    <div class="col-10">
                        <input disabled class="form-control" name="name" type="text" value="{{ old('name', $contact->name) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Email</label>
                    <div class="col-10">
                        <input disabled class="form-control" name="email" type="text" value="{{ old('email', $contact->email) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label"> Contact Message </label>
                    <div class="col-10">
                        <textarea disabled class="form-control" name="message">{{ old('message', $contact->message) }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Responses</h3>
            </div>

            <div class="card-body">
                @forelse($contact->responses()->orderBy('created_at', 'desc')->get() as $response)
                    <div class="form-group row">
                        <label class="col-2 col-form-label"> {{ $response->name }}</label>
                        <div class="col-10">
                            <textarea disabled  class="form-control" name="response">{{ $response->message }}</textarea>
                        </div>
                    </div>
                @empty
                    <div class="form-group row">
                        <div class="col-12">
                            <p>There has been no responses made.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

        @if(Auth::user()->hasPermissionTo('send contacts'))
        <div class="card card-custom gutter-b example example-compact">
            <form method="POST" action="{{ route('admin.contacts.store') }}">
            @csrf
            <input type="hidden" name="contact_id" value="{{ $contact->id }}">
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-2 col-form-label"> Send a response</label>
                    <div class="col-10">
                        <textarea  class="form-control" name="response">{{ old('response') }}</textarea>
                        @error('response')
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
                        <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
        </div>
        @else
            <div class="card card-custom gutter-b example example-compact">
                <div class="card-header">
                    <h3 class="card-title">You do not have permission to send replies please contact a system admin</h3>
                </div>
            </div>
        @endif
    @else

        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">You do not have permission to view contacts please contact a system admin</h3>
            </div>
        </div>

    @endif


@endsection

{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection

