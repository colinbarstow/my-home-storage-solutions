<div>
    <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 20px">
        <label>Card holder name</label>
        <input type="text" id="card-holder-name" class="form-control" name="card-holder-name" required />
    </div>

    <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 20px">
        <label>Card details</label>
        <div id="card-element" class="form-control"></div>
    </div>

    <p class="checkout-info">
        By placing your order you agree to our Terms & Conditions, privacy and returns policies . You also consent to some of your data being stored by
        {{ config('app.name') }}, which may be used to make future shopping experiences better for you.
    </p>

    <button id="card-button" type="button" class="btn btn-dark btn-order">Place Order</button>
</div>
