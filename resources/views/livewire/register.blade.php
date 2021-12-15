<div class="tab-pane" id="register-user">
    <p><small style="color: red">{{ $registerError }}</small></p>
    @csrf
    <div class="form-group">
        <label for="first-name">Your first name:</label>
        <input type="text" wire:model="registerEmail" class="form-control" id="first-name" name="first_name" autocomplete="off" required>
    </div>
    <div class="form-group">
        <label for="last-name">Your last name:</label>
        <input type="text" wire:model="registerFirstName" class="form-control" id="last-name" name="last_name" autocomplete="off" required>
    </div>
    <div class="form-group">
        <label for="email">Your email address:</label>
        <input type="email" wire:model="registerLastName" class="form-control" id="email" name="email" autocomplete="off" required>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" wire:model="registerPassword" class="form-control" id="password" name="password" autocomplete="off" required>
    </div>
    <div class="form-group">
        <label for="password_confirmed">Confirm Password:</label>
        <input type="password" wire:model="registerPasswordConfirm" class="form-control" id="password_confirmed" autocomplete="off" name="password_confirmed" required>
    </div>
    <button class="btn btn-primary btn-block" style="margin-bottom: 25px;" type="button" wire:click="register">Register</button>
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

