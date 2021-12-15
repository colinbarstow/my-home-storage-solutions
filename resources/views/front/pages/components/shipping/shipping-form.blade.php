<div class="row">
    <div class="col-xs-12 col-lg-6 col-md-6 col-sm-12">
        <label>First Name * @if($this->firstnameShippingError) <small style="color: red">{{ $this->firstnameShippingError }}</small>@endif </label>
        <input type="text" class="form-control" wire:model.defer="firstnameShipping" name="first-name" required />
    </div>
    <div class="col-xs-12 col-lg-6 col-md-6 col-sm-12">
        <label>Last Name * @if($this->lastnameShippingError) <small style="color: red">{{ $this->lastnameShippingError }}</small>@endif</label>
        <input type="text" class="form-control" wire:model.defer="lastnameShipping" name="last-name" required />
    </div>
</div>
<div class="row" style="margin-top: 10px">
    <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
        <label>Address Line 1 * @if($this->line1ShippingError) <small style="color: red">{{ $this->line1ShippingError }}</small>@endif</label>
        <input type="text" class="form-control" wire:model.defer="line1Shipping" name="address1" required placeholder="House number and Street name" />
    </div>
</div>
<div class="row" style="margin-top: 10px">
    <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
        <label>Address Line 2 (optional)</label>
        <input type="text" class="form-control" wire:model.defer="line2Shipping" name="address2" placeholder="Appartments, suite, unit etc ..." />
    </div>
</div>

<div class="row" style="margin-top: 10px">
    <div class="col-xs-12 col-lg-6 col-md-6 col-sm-12">
        <label>Town / City *</label>
        <input type="text" class="form-control" wire:model.defer="townShipping" name="town" required />
    </div>
    <div class="col-xs-12 col-lg-6 col-md-6 col-sm-12">
        <label>County * </label>
        <input type="text" class="form-control" wire:model.defer="countyShipping" name="county" required />
    </div>
</div>
<div class="row" style="margin-top: 10px">
    <div class="col-xs-12 col-lg-6 col-md-6 col-sm-12">
        <label>Postcode * </label>
        <input type="text" class="form-control" wire:model.defer="postcodeShipping" name="postcode" required />
    </div>
    <div class="col-xs-12 col-lg-6 col-md-6 col-sm-12">
        <label>Phone (Optional)</label>
        <input type="text" class="form-control" name="phone" />
    </div>
</div>
