@extends('front.layout')
@section('page-css')
    <style>
        .alert-danger{
            background-color: #fff;
            border: none;
        }
    </style>
@endsection
@section('content')
    <div class="page-header" style="background-image: url({{ asset('front/images/page-header.jpg') }})">
        <h1 class="page-title">{{ $details->website_name }} Registration</h1>
    </div>
    <div class="page-content mt-6">
        <div class="container">
            <div class="row gutter-lg">
                <div class="col-lg-12">
                    <div class="login-popup" style="margin: 0 auto">
                        <div class="tab tab-nav-simple tab-nav-boxed form-tab">
                            <div id="register-user">
                                <form id="register-user-form" method="post" action="{{ route('register-new-user') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="first-name">Your first name:</label>
                                        <input type="text" class="form-control" value="{{ old('first_name') }}" id="first-name" name="first_name" required>
                                        @error('first_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="last-name">Your last name:</label>
                                        <input type="text" class="form-control" value="{{ old('last_name') }}" id="last-name" name="last_name" required>
                                        @error('last_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Your email address:</label>
                                        <input type="email" value="{{ old('email') }}" class="form-control" id="email" name="email" required>
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password:</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                        @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmed">Confirm Password:</label>
                                        <input type="password" class="form-control" id="password_confirmed" name="password_confirmed" required>
                                        @error('password_confirmed')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-footer">
                                        <div class="form-checkbox">
                                            <input type="checkbox" class="custom-checkbox" id="register-agree" name="register-agree" required>
                                            <label class="form-control-label font-secondary" for="register-agree">I agree to the privacy policy</label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-block" type="submit">Register</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
