@extends('auth.layout')
@section('content')
    <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">

        <div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">

            <div class="d-flex flex-column-fluid flex-center">

                <div class="login-form login-signin">

                    <form class="form" method="POST" action="{{ route('login') }}" novalidate="novalidate" id="kt_login_signin_form">
                        @csrf

                        <div class="pb-13 pt-lg-0 pt-5">
                            <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Welcome to {{ config('app.name') }}</h3>
                        </div>

                        <div class="form-group">
                            <label class="font-size-h6 font-weight-bolder text-dark">Email</label>
                            <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" type="text" value="{{ old('email') }}" name="email" autocomplete="off" />
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="d-flex justify-content-between mt-n5">
                                <label class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>
                                <a href="javascript:;" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5" id="kt_login_forgot">Forgot Password ?</a>
                            </div>
                            <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" type="password" name="password" autocomplete="off" />
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="pb-lg-0 pb-5">
                            <button type="submit" id="kt_login_signin_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Sign In</button>
                        </div>

                    </form>

                </div>

                <div class="login-form login-forgot">

                    <form class="form" novalidate="novalidate" id="kt_login_forgot_form">

                        <div class="pb-13 pt-lg-0 pt-5">
                            <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Forgotten Password ?</h3>
                            <p class="text-muted font-weight-bold font-size-h4">Enter your email to reset your password</p>
                        </div>

                        <div class="form-group">
                            <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" type="email" placeholder="Email" name="email" autocomplete="off" />
                        </div>

                        <div class="form-group d-flex flex-wrap pb-lg-0">
                            <button type="button" id="kt_login_forgot_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Submit</button>
                            <button type="button" id="kt_login_forgot_cancel" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3">Cancel</button>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>
@endsection
