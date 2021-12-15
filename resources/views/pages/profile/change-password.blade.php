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
                                <a href="" class="text-muted">Change Password</a>
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
                                    <h3 class="card-label font-weight-bolder text-dark">Password</h3>
                                    <span class="text-muted font-weight-bold font-size-sm mt-1">Change your account password</span>
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Form-->
                            <div class="card-body">
                                <form action="{{ route('admin.account.update-password', Auth::user()->id) }}" method="POST">

                                    @csrf

                                    {{ method_field('PATCH') }}


                                    <div class="row">
                                        <div class="col-lg-9 col-xl-6">
                                            <h5 class="font-weight-bold mb-6">Password</h5>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Current password</label>
                                        <div class="col-lg-9 col-xl-6">

                                            <input name="current_password" class="form-control form-control-lg form-control-solid" type="password"/>


                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">New password</label>
                                        <div class="col-lg-9 col-xl-6">

                                            <input name="password" class="form-control form-control-lg form-control-solid" type="password"/>


                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Confirm new password</label>
                                        <div class="col-lg-9 col-xl-6">

                                            <input name="confirm_password" class="form-control form-control-lg form-control-solid" type="password"/>


                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-xl-3 col-lg-3 "></div>
                                        <div class="col-lg-9 col-xl-6">
                                            <button type="submit" class="btn btn-success mr-2">Save changes</button>
                                        </div>
                                    </div>

                                </form>
                                    <!--begin::Form Group-->
                                    <div class="separator separator-dashed my-5"></div>
                                    <!--begin::Form Group-->
                                    <div class="row">
                                        <div class="col-lg-9 col-xl-6">
                                            <h5 class="font-weight-bold mb-6">Security</h5>
                                        </div>
                                    </div>
                                    <!--begin::Form Group-->
                                @if(session('auth.password_confirmed_at'))
                                    @if(Auth::user()->two_factor_secret)
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Your two factor Authentication QR code</label>
                                            <div class="col-lg-9 col-xl-6">
                                                {!! Auth::user()->twoFactorQrCodeSvg() !!}
                                                <p class="form-text text-muted pt-2">Scan this code into your authenticator app</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Download two-factor authentication recovery codes</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <a href="{{ route('download-recovery-codes') }}" class="btn btn-light-primary font-weight-bold btn-sm">Download</a>
                                                <p class="form-text text-muted pt-2">Once downloaded keep this file safe, these recovery codes can be used to recover your account if required.</p>
                                            </div>
                                        </div>
                                        <form method="POST" action="{{ url('user/two-factor-authentication') }}">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Disable two-factor authentication</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <button type="submit" class="btn btn-light-danger font-weight-bold btn-sm">Remove two-factor authentication</button>
                                                    <p class="form-text text-muted pt-2">You will no longer be asked to authenticate your account after logging in.
                                                        <a href="#" class="font-weight-bold">Learn more</a>.</p>
                                                </div>
                                            </div>
                                        </form>
                                    @else
                                        <form action="{{ url('user/two-factor-authentication') }}" method="POST">
                                                @csrf
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Enable two-factor authentication</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <button type="submit" class="btn btn-light-primary font-weight-bold btn-sm">Setup two-factor authentication</button>
                                                        <p class="form-text text-muted pt-2">After you log in, you will be asked to authenticate your account, this is to protect your account from being compromised.
                                                            <a href="#" class="font-weight-bold">Learn more</a>.</p>
                                                    </div>
                                                </div>
                                    </form>
                                    @endif
                                @else
                                    @if(Auth::user()->two_factor_secret)
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Your two factor Authentication QR code</label>
                                            <div class="col-lg-9 col-xl-6">
                                                {!! Auth::user()->twoFactorQrCodeSvg() !!}
                                                <p class="form-text text-muted pt-2">Scan this code into your authenticator app</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Download two-factor authentication recovery codes</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <a href="{{ route('download-recovery-codes') }}" class="btn btn-light-primary font-weight-bold btn-sm">Download</a>
                                                <p class="form-text text-muted pt-2">Once downloaded keep this file safe, these recovery codes can be used to recover your account if required.</p>
                                            </div>
                                        </div>
                                        <div id="two_factor_block">
                                            <p>To disable two-factor authentication you must first confirm your password</p>
                                            <form action="{{ url('user/confirm-password') }}" method="POST">
                                                @csrf
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Confirm Password</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" type="password" placeholder="Password" name="password" autocomplete="off" required />
                                                        <p class="form-text text-muted pt-2">Enter your password to disable two-factor authentication</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-xl-3 col-lg-3 "></div>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <button type="submit" class="btn btn-success mr-2">Confirm Password</button>
                                                    </div>
                                                </div>
                                            </form>
                                    @else
                                        <div id="two_factor_block">
                                        <p>To enable two-factor authentication you must first confirm your password</p>
                                        <form action="{{ url('user/confirm-password') }}" method="POST">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Confirm Password</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" type="password" placeholder="Password" name="password" autocomplete="off" required />
                                                    <p class="form-text text-muted pt-2">Enter your password to enable two-factor authentication</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-xl-3 col-lg-3 "></div>
                                                <div class="col-lg-9 col-xl-6">
                                                    <button type="submit" class="btn btn-success mr-2">Confirm Password</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    @endif
                                @endif
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
