<div>

    <div id="loader_lad" style="
                  opacity:    0.5;
                  background: #000;
                  width:      100%;
                  height:     100%;
                  z-index:    10;
                  top:        0;
                  left:       0;
                  position:   fixed;
                  display:    none
            ">
        <div style="color: #64d6e2; margin:25% auto;" class="la-ball-circus la-4x;">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    @if(!$this->completed)
    <p>
        You have {{ $order->formattedAmountLeft() }} left to pay. <br>
        You can make a payment using the payment section below. <br>
        Your order will not be dispatched until the remaining amount has been paid.
    </p>
    <hr>

    <table style="margin-bottom:20px">
            <tbody>
            <tr class="sumnary-shipping shipping-row-last">
                <td colspan="2">
                    <h4 class="summary-subtitle">Payment</h4>
                    <ul>
                        <li>
                            <div class="custom-radio">
                                <input type="radio" id="total" wire:click="paymentClicked('total')" name="payment_type" class="custom-control-input" checked>
                                <label class="custom-control-label" for="total">Full Amount {{ $order->formattedAmountLeft() }}</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-radio">
                                <input type="radio" id="deposit" wire:click="paymentClicked('set')" name="payment_type" class="custom-control-input">
                                <label class="custom-control-label" for="deposit">Set an amount</label>
                            </div>
                        </li>

                    </ul>
                </td>
            </tr>
            </tbody>
    </table>

    <div class="form-group">
        <label class="form-control-label font-secondary" for="set_amount">Define an amount <small>minimum amount £{{ $this->min }}</small></label>
        <input type="number" max="{{ $this->max }}" min="{{ $this->min }}" step=".01" class="form-control" id="set_amount" wire:model.debounce.1s="setAmount">
    </div>




    <hr>

    <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 20px">
        <label>Card holder name</label>
        <input type="text" id="card-holder-name" class="form-control" name="card-holder-name" required />
    </div>


    <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 20px">
        <label>Card details</label>
        <div id="card-element" class="form-control"></div>
    </div>

    <p class="checkout-info">
        By paying you agree to our Terms & Conditions, privacy and returns policies . You also consent to some of your data being stored by
        {{ config('app.name') }}, which may be used to make future shopping experiences better for you.
    </p>

{{--    <p>You are about to make a payment for {{ $this->amountToPay }}</p>--}}

    <button id="card-button" type="button" class="btn btn-dark btn-order">Pay now</button>
    @else
        <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 20px; text-align: center">
            <i style="font-size: 40px; color:green" class="fa fa-check"></i>
            <br><br>
            <p style="color:green">Thank you, we have received your payment and sent an email to confirm this.</p>
        </div>
    @endif
</div>
