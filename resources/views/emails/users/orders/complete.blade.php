@component('mail::message')
# You order is complete

Dear {{ $order->user->fullName() }},
We are writing to inform you that your Order is complete.

What happens next?

Your order will now begin it's shipping process and we will be in touch shortly to arrange a delivery date and time.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
