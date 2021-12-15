{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    @if(Auth::user()->hasPermissionTo('site config'))
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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">{{ config('app.name') }}</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">Configurations</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">Contact</a>
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
                                @include('pages.site-configurations.partials.basic')
                                @include('pages.site-configurations.partials.contact')
                                @include('pages.site-configurations.partials.nav')
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
                                    <h3 class="card-label font-weight-bolder text-dark">Contact Information</h3>
                                    <span class="text-muted font-weight-bold font-size-sm mt-1">Change your websites contact information</span>
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Form-->
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.site-configurations.contact-information.update', $configuration->id) }}" class="form">
                                    @csrf
                                    {{ method_field('PATCH') }}

                                    <div class="row">
                                        <div class="col-lg-9 col-xl-6">
                                            <h5 class="font-weight-bold mb-6">Contact Details</h5>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Contact Email Address</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group input-group-lg input-group-solid">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-at"></i>
                                                    </span>
                                                </div>
                                                <input type="email" name="contact_email" class="form-control form-control-lg form-control-solid" value="{{ old('contact_email', $configuration->contact_email) }}" placeholder="Contact Email" />
                                            </div>
                                            @error('contact_email')
                                            <span class="invalid-feedback">
                                                    <strong>
                                                        {{ $message }}
                                                    </strong>
                                                </span>
                                            @enderror
                                            <span class="form-text text-muted">This is the email address displayed to the public.</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Contact Form Email Address</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group input-group-lg input-group-solid">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-at"></i>
                                                    </span>
                                                </div>
                                                <input type="email" name="contact_form_email" class="form-control form-control-lg form-control-solid" value="{{ old('contact_form_email', $configuration->contact_form_email) }}" placeholder="Contact Form Email" />
                                            </div>
                                            @error('contact_form_email')
                                            <span class="invalid-feedback">
                                                    <strong>
                                                        {{ $message }}
                                                    </strong>
                                                </span>
                                            @enderror
                                            <span class="form-text text-muted">This is the email address where contact form submissions will be delivered to.</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Contact Number</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group input-group-lg input-group-solid">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-phone"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="contact_number" class="form-control form-control-lg form-control-solid" value="{{ old('contact_number', $configuration->contact_number) }}" placeholder="Contact Number" />
                                            </div>
                                            @error('contact_number')
                                            <span class="invalid-feedback">
                                                    <strong>
                                                        {{ $message }}
                                                    </strong>
                                                </span>
                                            @enderror
                                            <span class="form-text text-muted">This is the contact number displayed to the public.</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Address</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group input-group-lg input-group-solid">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-home"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="address" class="form-control form-control-lg form-control-solid" value="{{ old('address', $configuration->address) }}" placeholder="Contact Address" />
                                            </div>
                                            @error('address')
                                            <span class="invalid-feedback">
                                                    <strong>
                                                        {{ $message }}
                                                    </strong>
                                                </span>
                                            @enderror
                                            <span class="form-text text-danger">Separate address sections with a comma e.g. 12 the street, town, LN1 1DA.</span>
                                            <span class="form-text text-muted">This is the address displayed to the public.</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-3"></div>
                                        <div class="col-lg-9 col-xl-6">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
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
    @endif
@endsection


{{-- Scripts Section --}}
@section('scripts')
    <script>
        $('#enable_two_factor').on('click', function(){
            $('#two_factor_block').show();
        });
    </script>
    <script src="{{ asset('js/pages/custom/profile/profile.js') }}"></script>

@endsection
