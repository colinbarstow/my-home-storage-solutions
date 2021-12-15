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
                                <a href="" class="text-muted">Settings</a>
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
                <!--begin::Profile Personal Information-->
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
                        <div class="card card-custom card-stretch">
                            <!--begin::Header-->
                            <div class="card-header py-3">
                                <div class="card-title align-items-start flex-column">
                                    <h3 class="card-label font-weight-bolder text-dark">Your websites settings</h3>
                                    <span class="text-muted font-weight-bold font-size-sm mt-1">Update the websites settings</span>
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Form-->
                            <form class="form"
                                  action="{{ route('admin.site-configurations.settings.update', $configuration->id) }}"
                                  method="POST"
                            >
                                @csrf
                                {{ method_field('PATCH') }}
                                <!--begin::Body-->
                                <div class="card-body">
                                    <div class="row">
                                        <label class="col-xl-3"></label>
                                        <div class="col-lg-9 col-xl-6">
                                            <h5 class="font-weight-bold mb-6">Your websites main settings</h5>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Deposit amount (%)</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control form-control-lg form-control-solid" name="deposit" type="number" step="1" value="{{ old('deposit', $configuration->deposit) }}" />
                                            @error('deposit')
                                                <span class="invalid-feedback">
                                                    <strong>
                                                        {{ $message }}
                                                    </strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Measurement used</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control form-control-lg form-control-solid" name="measurement" type="text" value="{{ old('measurement', $configuration->measurement) }}" />
                                            @error('measurement')
                                            <span class="invalid-feedback">
                                                    <strong>
                                                        {{ $message }}
                                                    </strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Banner Message</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control form-control-lg form-control-solid" name="banner_message" type="text" value="{{ old('banner_message', $configuration->banner_message) }}" />
                                            @error('banner_message')
                                            <span class="invalid-feedback">
                                                    <strong>
                                                        {{ $message }}
                                                    </strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Show banner?</label>
                                        <div class="col-10 col-form-label">
                                            <div class="checkbox-inline">
                                                <label class="checkbox">
                                                    <input type="checkbox" name="show_banner" {{ old('show_banner') == 'on' || $configuration->show_banner == true ? 'checked' : '' }}>
                                                    <span></span>Active</label>
                                            </div>
                                            <span class="form-text text-muted">If checked, the banner will be displayed on all the front end pages</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-3"></div>
                                        <div class="col-lg-9 col-xl-6">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
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
    @endif
@endsection


{{-- Scripts Section --}}
@section('scripts')

    <script src="{{ asset('js/pages/custom/profile/profile.js') }}"></script>

@endsection
