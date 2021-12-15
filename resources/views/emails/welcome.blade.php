@extends('beautymail::templates.ark')

@section('content')

    @include('beautymail::templates.ark.heading', [
		'heading' => 'Your ' . config('app.name') . ' account',
		'level' => 'h1'
	])

    @include('beautymail::templates.ark.contentStart')

    <h4 class="secondary"><strong>Hey {{ ucwords($user->first_name) }}</strong></h4>
    <p>A {{ config('app.name') }} admin account has been set up for you.</p>
    <p>You can now access your account by clicking the link below.
        Please use the following password: <strong>{{ $password }}</strong> <br>
        Once logged in you can change your password from your account settings area.</p>

    @include('beautymail::templates.sunny.button', ['title' => 'Login', 'link' => route('profile.overview') ])

    @include('beautymail::templates.ark.contentEnd')


@stop

