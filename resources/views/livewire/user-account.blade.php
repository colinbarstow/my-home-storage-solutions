<div>
    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
        <h2>Account Details</h2>
        @if($this->showMessage)
            <small style="color: green">{{ $this->message }}</small>
        @endif
        <form wire:submit.prevent="submit">
            <div class="row" style="margin-bottom:10px">
                <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                    <label>First Name *  </label>
                    <input type="text" class="form-control" wire:model.defer="firstname" name="first-name" required />
                    @error('firstname') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row" style="margin-bottom:10px">
                <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                    <label>Last Name * </label>
                    <input type="text" class="form-control" wire:model.defer="lastname" name="last-name" required />
                    @error('lastname') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row" style="margin-bottom:10px">
                <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                    <label>Email 1 * </label>
                    <input type="email" class="form-control" wire:model.defer="email" name="email" required />
                    @error('email') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <hr>
            <h3>Password</h3>
            <small>Leave blank if you do not wish to change</small>
            @if($this->passwordError !== null)
                <small style="color:red">{{ $this->passwordError }}</small>
            @endif
            <div class="row" style="margin-bottom:10px">
                <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                    <label>Old Password</label>
                    <input type="password" class="form-control" wire:model.defer="password" name="password" />
                    @error('password') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row" style="margin-bottom:10px">
                <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                    <label>New Password </label>
                    <input type="password" class="form-control" wire:model.defer="newPassword" name="new_password" />
                    @error('new_password') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row" style="margin-bottom:10px">
                <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                    <label>Confirm Password </label>
                    <input type="password" class="form-control" wire:model.defer="confirmedPassword" name="confirm_password" />
                    @error('confirm_password') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" wire:click="cancel" class="btn btn-danger">Cancel</button>
        </form>
    </div>
</div>
