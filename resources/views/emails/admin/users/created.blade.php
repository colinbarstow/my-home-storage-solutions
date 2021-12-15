@component('mail::message')
# Your Account has been created

<h4 class="secondary"><strong>Hey {{ ucwords($user->first_name) }}</strong></h4>
<p>A {{ config('app.name') }} admin account has been set up for you.</p>
<p>You can now access your account by clicking the link below.
    Please use the following password: <strong>{{ $password }}</strong> <br>
    Once logged in you can change your password from your account settings area.</p>

@component('mail::button', ['url' => route('admin.profile.personal-information')])
    Login Herre
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent


