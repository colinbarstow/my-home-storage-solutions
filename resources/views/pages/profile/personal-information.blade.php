{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Mobile Toggle-->
                    <button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none" id="kt_subheader_mobile_toggle">
                        <span></span>
                    </button>
                    <!--end::Mobile Toggle-->
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold my-1 mr-5">{{ Auth::user()->fullName() }}</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">Your Profile</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">Personal Information</a>
                            </li>
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>

            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Profile Personal Information-->
                <div class="d-flex flex-row">
                    <!--begin::Aside-->
                    <div class="flex-row-auto offcanvas-mobile w-250px w-xxl-350px" id="kt_profile_aside">
                        <!--begin::Profile Card-->
                        <div class="card card-custom card-stretch">
                            <!--begin::Body-->
                            <div class="card-body pt-4">
                                @include('pages.profile.partials.toolbar')
                                @include('pages.profile.partials.user')
                                @include('pages.profile.partials.contact')
                                @include('pages.profile.partials.nav')
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Profile Card-->
                    </div>
                    <!--end::Aside-->
                    <!--begin::Content-->
                    <div class="flex-row-fluid ml-lg-8">
                        <!--begin::Card-->
                        <div class="card card-custom card-stretch active">
                            <!--begin::Header-->
                            <div class="card-header py-3">
                                <div class="card-title align-items-start flex-column">
                                    <h3 class="card-label font-weight-bolder text-dark">Personal Information</h3>
                                    <span class="text-muted font-weight-bold font-size-sm mt-1">Update your personal information</span>
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Form-->
                            <form class="form"
                                  enctype="multipart/form-data"
                                  id="updateProfileForm"
                                  action="{{ route('admin.profile.update', Auth::user()->adminProfile->id) }}"
                                  method="POST"
                            >
                                @csrf
                                {{ method_field('PATCH') }}
                                <!--begin::Body-->
                                <div class="card-body">
                                    <div class="row">
                                        <label class="col-xl-3"></label>
                                        <div class="col-lg-9 col-xl-6">
                                            <h5 class="font-weight-bold mb-6">Your Information</h5>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url({{ asset('media/users/blank.png') }})">
                                                <div class="image-input-wrapper" style="background-image: url('{{ \Illuminate\Support\Facades\Storage::url(Auth::user()->adminProfile->image) }}')"></div>
                                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                    <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" />
                                                    <input type="hidden" name="profile_avatar_remove" />
                                                </label>
                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>
                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>
                                            </div>
                                            <span class="form-text text-muted">Allowed file types: png, jpg, jpeg</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">First Name</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control form-control-lg form-control-solid" name="first_name" type="text" value="{{ old('first_name', Auth::user()->first_name) }}" />
                                            @error('first_name')
                                                <span class="invalid-feedback">
                                                    <strong>
                                                        {{ $message }}
                                                    </strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Last Name</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control form-control-lg form-control-solid" name="last_name" type="text" value="{{ old('last_name', Auth::user()->last_name) }}" />
                                            @error('last_name')
                                                <span class="invalid-feedback">
                                                    <strong>
                                                        {{ $message }}
                                                    </strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Job Title</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control form-control-lg form-control-solid" name="job_title" type="text" value="{{ old('job_title', Auth::user()->adminProfile->job_title) }}" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Location</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control form-control-lg form-control-solid" name="location" type="text" value="{{ old('location', Auth::user()->adminProfile->location) }}" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-xl-3"></label>
                                        <div class="col-lg-9 col-xl-6">
                                            <h5 class="font-weight-bold mt-10 mb-6">Contact Info</h5>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Contact Phone</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group input-group-lg input-group-solid">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-phone"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control form-control-lg form-control-solid" name="telephone_number" value="{{ old('telephone_number', Auth::user()->adminProfile->telephone_number) }}" placeholder="Phone" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group input-group-lg input-group-solid">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-at"></i>
                                                    </span>
                                                </div>
                                                <input disabled type="text" name="email" class="form-control form-control-lg form-control-solid" value="{{ old('email', Auth::user()->email) }}" placeholder="Email" />
                                            </div>
                                            @error('email')
                                                <span class="invalid-feedback">
                                                    <strong>
                                                        {{ $message }}
                                                    </strong>
                                                </span>
                                            @enderror
                                            <span class="form-text text-muted">You can change your email address in your account settings.</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <button type="submit" class="btn btn-success mr-2">Save Changes</button>
                                    </div>
                                </div>
                                <!--end::Body-->
                            </form>
                            <!--end::Form-->
                        </div>
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Profile Personal Information-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>

@endsection


{{-- Scripts Section --}}
@section('scripts')

    <script src="{{ asset('js/pages/custom/profile/profile.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
@endsection
