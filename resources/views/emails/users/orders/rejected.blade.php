@component('mail::message')
# Your order has been rejected

Dear {{ $order->user->fullName() }},
We are sorry to inform you that your order: {{ $order->id }} has been rejected by our workshop.
This can be due to numerous reasons.
We would like to take this opportunity to advise you that the total amount you paid of {{ $order->formattedAmountPaid() }} has been refunded and should be back in your account with in 2-5 working days.
If you would like more information as to why the order was rejected please call us on {{ config('site_configurations.details.contact_number') }} and quote your order number: {{ $order->id }}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
