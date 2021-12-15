@component('mail::message')
# New Contact

You have received a new contact form submission from {{ $contact->name }}

@component('mail::button', ['url' => route('admin.contacts.index', $contact->id)])
View here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
