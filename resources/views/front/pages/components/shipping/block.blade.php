<div>
    <h3 style="margin-top:30px" class="title title-simple text-left">Shipping Details</h3>
    @if(Auth::user())
        @if($this->showUsersShippingAddresses)
            <div class="sumnary-shipping shipping-row-last" style="padding: 20px; background-color: #f3f3f3; height: 180px; overflow-y: scroll; margin-bottom: 30px">
                <ul>
                    @foreach(Auth::user()->shippingAddresses()->orderBy('default', 'desc')->get() as $shipping)
                        <li>
                            <div class="custom-radio">
                                <input type="radio" id="shipping_address{{ $shipping->id }}" wire:click="shippingAddressChanged('{{ $shipping->id }}')" :key="{{ $shipping->id }}" name="shipping_address" class="custom-control-input" @if($shipping->default) checked @endif>
                                <label class="custom-control-label" for="shipping_address{{ $shipping->id }}">{{ $shipping->compiled() }}</label>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if($this->showAddShippingButton)
            <button class="btn btn-primary" wire:click="addNewShipping">Add a new shipping address</button>
        @endif
        @if($this->showAddShipping)
            <div>
                @include('front.pages.components.shipping.shipping-form')
            </div>
        @endif
        <div style="margin-top: 20px">
            @if($this->saveShippingAddress)
                <button class="btn btn-primary" wire:click="saveShipping">Save</button>
            @endif
            @if($this->showCancelAddingShippingButton)
                <button class="btn btn-danger" wire:click="cancelNewShipping">Cancel adding shipping address</button>
            @endif
        </div>

    @else
        @if(!$this->shipToSame)
            <div>
                @include('front.pages.components.shipping.shipping-form')
            </div>
        @endif
    @endif
</div>

