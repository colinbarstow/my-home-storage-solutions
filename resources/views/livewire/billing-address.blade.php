<div>
    @if($this->hasBillingAddress)
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                @if($this->showBillingAddress)
                    <p>{!! $this->billingAddressCompiled !!}</p>
                @endif
                @if($this->showEditBillingAddress)
                        <div class="row" style="margin-bottom:10px">
                            <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                                <label>First Name *  <small style="color: red">{{ $this->firstnameError }}</small></label>
                                <input type="text" class="form-control" wire:model.defer="firstname" name="first-name" required />
                            </div>
                        </div>
                        <div class="row" style="margin-bottom:10px">
                            <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                                <label>Last Name * <small style="color: red">{{ $this->lastnameError }}</small></label>
                                <input type="text" class="form-control" wire:model.defer="lastname" name="last-name" required />
                            </div>
                        </div>
                        <div class="row" style="margin-bottom:10px">
                            <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                                <label>Address Line 1 * <small style="color: red">{{ $this->line1Error }}</small></label>
                                <input type="text" class="form-control" wire:model.defer="line1" name="address1" required placeholder="House number and Street name" />
                            </div>
                        </div>
                        <div class="row" style="margin-bottom:10px">
                            <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                                <label>Address Line 2 (optional)</label>
                                <input type="text" class="form-control" wire:model.defer="line2" name="address2" placeholder="Appartments, suite, unit etc ..." />
                            </div>
                        </div>
                        <div class="row" style="margin-bottom:10px">
                            <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                                <label>Town / City * <small style="color: red">{{ $this->townError }}</small></label>
                                <input type="text" class="form-control" wire:model.defer="town" name="town" required />
                            </div>
                        </div>
                        <div class="row" style="margin-bottom:10px">
                            <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                                <label>County * <small style="color: red">{{ $this->countyError }}</small></label>
                                <input type="text" class="form-control" wire:model.defer="county" name="county" required />
                            </div>
                        </div>
                        <div class="row" style="margin-bottom:10px">
                            <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                                <label>Postcode * <small style="color: red">{{ $this->postcodeError }}</small></label>
                                <input type="text" class="form-control" wire:model.defer="postcode" name="postcode" required />
                            </div>
                        </div>
                @endif
            </div>
            <div class="col-lg-6 col-sm-12" style="padding-top:20px">
                @if($this->showBillingAddress)
                    <button wire:click="editBillingAddress" class="btn btn-primary">Edit</button>
                @endif

                @if($this->showEditBillingAddress)
                    <button wire:click="saveBillingAddress" class="btn btn-primary">Save Changes</button>
                @endif
            </div>
        </div>

    @else
        <div class="row" style="margin-bottom:10px">
            <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                <label>First Name *  <small style="color: red">{{ $this->firstnameError }}</small></label>
                <input type="text" class="form-control" wire:model.defer="firstname" name="first-name" required />
            </div>
        </div>
        <div class="row" style="margin-bottom:10px">
            <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                <label>Last Name * <small style="color: red">{{ $this->lastnameError }}</small></label>
                <input type="text" class="form-control" wire:model.defer="lastname" name="last-name" required />
            </div>
        </div>
        <div class="row" style="margin-bottom:10px">
            <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                <label>Address Line 1 * <small style="color: red">{{ $this->line1Error }}</small></label>
                <input type="text" class="form-control" wire:model.defer="line1" name="address1" required placeholder="House number and Street name" />
            </div>
        </div>
        <div class="row" style="margin-bottom:10px">
            <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                <label>Address Line 2 (optional)</label>
                <input type="text" class="form-control" wire:model.defer="line2" name="address2" placeholder="Appartments, suite, unit etc ..." />
            </div>
        </div>
        <div class="row" style="margin-bottom:10px">
            <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                <label>Town / City * <small style="color: red">{{ $this->townError }}</small></label>
                <input type="text" class="form-control" wire:model.defer="town" name="town" required />
            </div>
        </div>
        <div class="row" style="margin-bottom:10px">
            <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                <label>County * <small style="color: red">{{ $this->countyError }}</small></label>
                <input type="text" class="form-control" wire:model.defer="county" name="county" required />
            </div>
        </div>
        <div class="row" style="margin-bottom:10px">
            <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                <label>Postcode * <small style="color: red">{{ $this->postcodeError }}</small></label>
                <input type="text" class="form-control" wire:model.defer="postcode" name="postcode" required />
            </div>
        </div>
        <button wire:click="createBillingAddress" class="btn btn-primary">Save</button>
    @endif
</div>
