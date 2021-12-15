@component('mail::message')
# Your order has been accepted

Dear {{ $order->user->fullName() }},

Your order has been accepted by our workshop and will soon be ready.
We will inform you when your @if($order->totalProducts() > 1) items are ready. @else item is ready.@endif
You can track the current status of your order via your account, just click the button below.
@component('mail::button', ['url' => route('single-order', $order->id)])
My Account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
