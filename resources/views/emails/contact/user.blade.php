@component('mail::message')
# We have received your message

Hi {{ $contact->name }},

Thank you for contacting {{ config('app.name') }}.
We aim to respond to all our messages within 48 hours, we will be in contact with you shortly.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
