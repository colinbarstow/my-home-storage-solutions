@component('mail::message')
# Thank you for subscribing to our newsletter

This email is to confirm you are now a subscribed to the {{ config('app.name') }} newsletter.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
