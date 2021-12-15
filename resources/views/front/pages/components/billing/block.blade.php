<div>
    <h3 class="title title-simple text-left">Billing Details</h3>

    @if(Auth::user())

        @if($this->showUsersAddresses)

            <div class="sumnary-shipping shipping-row-last" style="padding: 20px; background-color: #f3f3f3; height: 180px; overflow-y: scroll; margin-bottom: 30px">

                <ul>

                    @foreach(Auth::user()->billingAddresses()->orderBy('default', 'desc')->get() as $billing)

                        <li>

                            <div class="custom-radio">

                                <input type="radio" id="billing_address{{ $billing->id }}" wire:click="billingAddressChanged('{{ $billing->id }}')" :key="{{ $billing->id }}" name="billing_address" class="custom-control-input" @if($billing->default) checked @endif>

                                <label class="custom-control-label" for="billing_address{{ $billing->id }}">{{ $billing->compiled() }}</label>

                            </div>

                        </li>

                    @endforeach

                </ul>

            </div>

        @endif

        @if($this->showAddBillingButton)

            <button class="btn btn-primary" wire:click="addNewBilling">Add a new billing address</button>

        @endif

        @if($this->showAddBilling)

            @include('front.pages.components.billing.billing-form')

        @endif

        @if($this->saveBillingAddress)

            <button class="btn btn-primary" wire:click="saveBilling">Save</button>

        @endif

        @if($this->showCancelAddingBillingButton)

            <button class="btn btn-danger" wire:click="cancelNewBilling">Cancel adding billing address</button>

        @endif

    @else

        @include('front.pages.components.billing.billing-form')

    @endif
</div>
