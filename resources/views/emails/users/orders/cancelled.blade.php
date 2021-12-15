@component('mail::message')
# Your order has been cancelled

Dear {{ $order->user->fullName() }},

We are writing to inform you that yourr order {{ $order->id }},
has been cancelled. This is usually a result of a request made by yourself however if it isn't and you are receiving this email unaware
please contact us on {{ config('site_configurations.details.contact_number') }}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
