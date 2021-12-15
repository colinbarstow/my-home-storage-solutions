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
                                <a href="" class="text-muted">Account Information</a>
                            </li>
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Profile Account Information-->
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
                        <div class="card card-custom">
                            <!--begin::Header-->
                            <div class="card-header py-3">
                                <div class="card-title align-items-start flex-column">
                                    <h3 class="card-label font-weight-bolder text-dark">Account Information</h3>
                                    <span class="text-muted font-weight-bold font-size-sm mt-1">Change your account settings</span>
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Form-->
                            <div class="card-body">
                                <form action="{{ route('admin.account.update', Auth::user()->adminProfile->id) }}" method="POST">

                                    @csrf

                                    {{ method_field('PATCH') }}

                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                    <div class="row">
                                        <div class="col-lg-9 col-xl-6">
                                            <h5 class="font-weight-bold mb-6">Account</h5>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Username</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="spinner spinner-sm spinner-success spinner-right">
                                                <input name="username" class="form-control form-control-lg form-control-solid" type="text" value="{{ old('username', Auth::user()->adminProfile->username) }}" />
                                            </div>
                                            @error('username')
                                            <span class="invalid-feedback">
                                                    <strong>
                                                        {{ $message }}
                                                    </strong>
                                                </span>
                                            @enderror
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
                                                <input type="text" name="email" class="form-control form-control-lg form-control-solid" value="{{ old('email', Auth::user()->email) }}" placeholder="Email" />
                                            </div>
                                            @error('email')
                                            <span class="invalid-feedback">
                                                    <strong>
                                                        {{ $message }}
                                                    </strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Notifications</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="checkbox-inline">
                                                <label class="checkbox">
                                                    <input name="email_c" type="checkbox" @if(Auth::user()->adminProfile->email) checked @endif />
                                                    <span></span>Email</label>
                                                <label class="checkbox">
                                                    <input name="sms" type="checkbox" @if(Auth::user()->adminProfile->sms) checked @endif />
                                                    <span></span>SMS</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-xl-3 col-lg-3 "></div>
                                        <div class="col-lg-9 col-xl-6">
                                            <button type="submit" class="btn btn-success mr-2">Save changes</button>
                                        </div>
                                    </div>

                                </form>

                            </div>

                            <!--end::Form-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Profile Account Information-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
@endsection


{{-- Scripts Section --}}
@section('scripts')
    <script>
        $('#enable_two_factor').on('click', function(){
            $('#two_factor_block').show();
        });
    </script>
    <script src="{{ asset('js/pages/custom/profile/profile.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
@endsection
