
<div class="row" style="margin-top: 10px">
        <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
            <label>Email address * @if($this->emailError) <small style="color: red">{{ $this->emailError }}</small>@endif</label>
            <input type="text" class="form-control" wire:model.defer="email" name="email-address" required="" />
        </div>
    </div>

<div class="form-checkbox mb-6">
    <input type="checkbox" class="custom-checkbox" wire:model="shipToSame" id="different-address" name="different-address" checked>
    <label class="form-control-label" for="different-address">Ship to same address?</label>
</div>

