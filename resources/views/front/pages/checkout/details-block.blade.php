<div>
    <div style="background-color: #fff; padding:20px; margin-bottom:10px">
        <h3 class="title title-simple text-left">Email Address</h3>
        <p>{{ Auth::user()->email }}</p>
    </div>

    <livewire:shipping-address/>

    <div style="background-color: #fff; padding:20px; margin-bottom:10px">
        <h3 class="title title-simple text-left">Billing Address</h3>
        <livewire:billing-address/>
    </div>

    <div style="background-color: #fff; padding:20px;">
        <h3 class="title title-simple text-left">Payment Details</h3>
        <table style="margin-bottom:20px">
            <tbody>
            <tr class="sumnary-shipping shipping-row-last">
                <td colspan="2">
                    <h4 class="summary-subtitle">Payment</h4>
                    <ul>
                        <li>
                            <div class="custom-radio">
                                <input type="radio" id="deposit" wire:click="paymentClicked('deposit')" name="payment_type" class="custom-control-input">
                                <label class="custom-control-label" for="deposit">Deposit £{{ $this->depositFormatted }} @if($this->showDepositMessage)
                                        <br><small style="color:red">The rest of the amount £{{ $this->remainingFormatted }} will be required upon completion.</small>@endif</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-radio">
                                <input type="radio" id="total" wire:click="paymentClicked('total')" name="payment_type" class="custom-control-input" checked>
                                <label class="custom-control-label" for="total">Full Amount £{{ $this->totalFormatted }}</label>
                            </div>
                        </li>
                    </ul>
                </td>
            </tr>
            </tbody>
        </table>

        <p style="color: red">{{ $this->paymentError }}</p>

        <livewire:card/>
    </div>
</div>
