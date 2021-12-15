@component('mail::message')
# Payment Received

<p>Dear {{ $order->user->fullName() }},</p>
<p>thank you for your recent payment of {{ $payment->formattedAmount() }} for your Order: {{ $order->id }}</p>

@if($order->paymentIsRequired())
<p>You have a total of {{ $order->formattedAmountLeft() }} left to pay. This can be done at any time via your account.</p>
@else
<p>You have now paid off your entire order, there are no payments remaining</p>
@endif

@component('mail::button', ['url' => route('my-account')])
My Account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
