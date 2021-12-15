 <div class="col-lg-6 col-sm-12 col-xs-12 col-md-6">
        <h2>{{ $this->name }} Address</h2>
        @if($this->showMessage)
            <small style="color:green">{{ $this->message }}</small>
        @endif
        @if(!$this->editAddress)
             @if($this->hasAddress)
                 <p>{!! $this->address !!}</p>
             @endif
             <br>
            <button wire:click="change" class="btn btn-primary">Change</button>
        @else
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
                     <label>Address Line 1 * </label>
                     <input type="text" class="form-control" wire:model.defer="line1" name="address1" required placeholder="House number and Street name" />
                     @error('line1') <span class="error">{{ $message }}</span> @enderror
                 </div>
             </div>
             <div class="row" style="margin-bottom:10px">
                 <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                     <label>Address Line 2 (optional)</label>
                     <input type="text" class="form-control" wire:model.defer="line2" name="address2" placeholder="Appartments, suite, unit etc ..." />
                     @error('line2') <span class="error">{{ $message }}</span> @enderror
                 </div>
             </div>
             <div class="row" style="margin-bottom:10px">
                 <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                     <label>Town / City * </label>
                     <input type="text" class="form-control" wire:model.defer="town" name="town" required />
                     @error('town') <span class="error">{{ $message }}</span> @enderror
                 </div>
             </div>
             <div class="row" style="margin-bottom:10px">
                 <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                     <label>County *</label>
                     <input type="text" class="form-control" wire:model.defer="county" name="county" required />
                     @error('county') <span class="error">{{ $message }}</span> @enderror
                 </div>
             </div>
             <div class="row" style="margin-bottom:10px">
                 <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                     <label>Postcode *</label>
                     <input type="text" class="form-control" wire:model.defer="postcode" name="postcode" required />
                     @error('postcode') <span class="error">{{ $message }}</span> @enderror
                 </div>
             </div>
             <button type="submit" class="btn btn-primary">Save</button>
             <button type="button" wire:click="cancel" class="btn btn-danger">Cancel</button>
         </form>
        @endif
    </div>
