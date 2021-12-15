<div class="tab-pane active" id="login-user" style="text-align: center">
    <h3 style="font-size: 12px">Use your email to sign in</h3>
    <p><small style="color: red">{{ $signinError }}</small></p>
    @csrf
    <div class="form-group" style="text-align: left">
        <label for="singin-email">Email address: </label>
        <input type="text" wire:model="signinEmail" class="form-control" id="singin-email" name="email" required />
    </div>

    <div class="form-group" style="text-align: left">
        <label for="singin-password">Password:</label>
        <input type="password" wire:model="signinPassword" class="form-control" id="singin-password" name="password" required />
    </div>

    <button class="btn btn-primary btn-block" type="button" wire:click="signin">Sign in</button>

    <div class="form-footer" style="text-align: center">
        <a href="#" class="lost-link font-secondary">Forgot your password?</a>
    </div>
    <hr>
    <div class="form-choice text-center">
        <label class="font-secondary">Sign in with social account</label>
        <div class="social-links">
            <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
            <a href="#" class="social-link social-twitter fab fa-twitter"></a>
            <a href="#" class="social-link social-google fab fa-google"></a>
        </div>
    </div>
</div>
