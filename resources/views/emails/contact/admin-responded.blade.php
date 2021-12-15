@component('mail::message')
# Your query has a reply

Hi, {{ $contact->name }},

{{ $response->name }} has replied to the contact query you sent us.

Please read the response below, do not reply to this email.
If you need to write a response, please click the button at the bottom of this email.
<br>
<br>
{{ $response->message }}
@component('mail::button', ['url' => ''])
Write a response
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
