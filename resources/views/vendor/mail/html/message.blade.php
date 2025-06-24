@component('mail::layout')
{{-- Header --}}
@slot('header')

{{-- Check that the $AMSSettings variable is set, images are set to be shown, and setup is complete --}}


@if (isset($AMSSettings) && ($AMSSettings::setupCompleted()))

    @if ($AMSSettings->show_url_in_emails=='1' )
        @component('mail::header', ['url' => config('app.url')])
    @else
        @component('mail::header', ['url' => ''])
    @endif

    {{-- Show images in email!  --}}
    @if (($AMSSettings->show_images_in_email=='1') && ($AMSSettings->email_logo!='') && ($AMSSettings->brand != '1'))

        {{-- $AMSSettings->brand = 1 = Text  --}}
        {{-- $AMSSettings->brand = 2 = Logo  --}}
        {{-- $AMSSettings->brand = 3 = Logo + Text  --}}
        @if ($AMSSettings->brand == '3')

            <img style="max-height: 100px; vertical-align:middle;" src="{{ \Storage::disk('public')->url(e($AMSSettings->email_logo)) }}">
            <br><br>
            {{ $AMSSettings->site_name }}
            <br><br>

        {{-- else if branding type is just logo --}}
        @elseif ($AMSSettings->brand == '2')
           <img style="max-height: 100px; vertical-align:middle;" src="{{ \Storage::disk('public')->url(e($AMSSettings->email_logo)) }}">
        @endif

    @else
        {{ $AMSSettings->site_name ?? config('app.name') }}
    @endif

@endif
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
@if($AMSSettings::setupCompleted())
© {{ date('Y') }} {{ $AMSSettings->site_name }}. All rights reserved.
@else
© {{ date('Y') }} NEEPCO AMS. All rights reserved.
@endif

@if ($AMSSettings->privacy_policy_link!='')
<a href="{{ $AMSSettings->privacy_policy_link }}">{{ trans('admin/settings/general.privacy_policy') }}</a>
@endif

@endcomponent
@endslot
@endcomponent
