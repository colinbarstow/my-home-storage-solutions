@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
<img height="100px" src="{{ config('app.url') . \Illuminate\Support\Facades\Storage::url(config('site_configurations.details.logo'))  }}" alt="{{config('app.name')}}">
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
@isset($canUnsubscribe)
<small>To unsubscribe from future mailing please click here</small>
@endisset
@endcomponent
@endslot
@endcomponent
