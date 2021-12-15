<div class="login-popup">
    <div class="form-box">
        <div class="tab tab-nav-simple tab-nav-boxed form-tab">
            <ul class="nav nav-tabs nav-fill" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#login-user">Sign in</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#register-user">Register</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="login-user">
                    <form id="login-user-form" method="post" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="singin-email">Email address:</label>
                            <input type="text" class="form-control" id="singin-email" name="email" required />
                        </div>
                        <div class="form-group">
                            <label for="singin-password">Password:</label>
                            <input type="password" class="form-control" id="singin-password" name="password"
                                   required />
                        </div>
                        <div class="form-footer">
                            <div class="form-checkbox">
                                <input type="checkbox" class="custom-checkbox" id="signin-remember"
                                       name="signin-remember" />
                                <label class="form-control-label font-secondary" for="signin-remember">Remember
                                    me</label>
                            </div>
                            <a href="#" class="lost-link font-secondary">Forgot your password?</a>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                    </form>
                    <div class="form-choice text-center">
                        <label class="font-secondary">Sign in with social account</label>
                        <div class="social-links">
                            <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                            <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                            <a href="#" class="social-link social-google fab fa-google"></a>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="register-user">
                    <form id="register-user-form" method="post" action="{{ route('register-new-user') }}">
                        @csrf
                        <div class="form-group">
                            <label for="first-name">Your first name:</label>
                            <input type="text" class="form-control" id="first-name" name="first_name" required>
                        </div>
                        <div class="form-group">
                            <label for="last-name">Your last name:</label>
                            <input type="text" class="form-control" id="last-name" name="last_name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Your email address:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmed">Confirm Password:</label>
                            <input type="password" class="form-control" id="password_confirmed" name="password_confirmed" required>
                        </div>
                        <div class="form-footer">
                            <div class="form-checkbox">
                                <input type="checkbox" class="custom-checkbox" id="register-agree" name="register-agree" required>
                                <label class="form-control-label font-secondary" for="register-agree">I agree to the privacy policy</label>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">Register</button>
                    </form>

                    <div class="form-choice text-center">
                        <label class="font-secondary">Sign in with social account</label>
                        <div class="social-links">
                            <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                            <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                            <a href="#" class="social-link social-google fab fa-google"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

