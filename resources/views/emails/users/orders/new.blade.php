@component('mail::message')
# Thank you for your order

Dear {{ $order->user->fullName() }},

Thank you for placing your order with {{ config('app.nam') }}.
Please find confirmation of your order below.
You can also view your order in your account at any time by clicking the button below.

@component('mail::button', ['url' => route('my-account')])
My Account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
