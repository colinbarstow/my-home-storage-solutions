@component('mail::message')
# Your {{ config('app.name') }} Account.

To {{ ucwords($user->first_name) }},
Thank you for registering an account with {{ config('app.name') }}.
Please click the link below to confirm your account.
Alternatively if the button does not show, please click the link

@component('mail::button', ['url' => route('profile.overview')])
Confirm my account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
