@component('mail::message')
# Request for payment

Dear {{ $order->user->fullName() }},

Your order is now complete, in order for us to be able to dispatch it we are requesting you make the remaining payment left on the order.
You can do this by clicking the link below and signing into your account.



@component('mail::button', ['url' => route('single-order', $order->id)])
Make a payment
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
