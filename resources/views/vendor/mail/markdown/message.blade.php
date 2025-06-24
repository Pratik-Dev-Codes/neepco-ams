@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
@if (($AMSSettings->show_images_in_email=='1' ) && ($AMSSettings::setupCompleted()))

@if ($AMSSettings->brand == '3')
@if ($AMSSettings->logo!='')
<img class="navbar-brand-img logo" src="{{ config('app.url') }}/uploads/{{ $AMSSettings->logo }}">
@endif
{{ $AMSSettings->site_name }}

@elseif ($AMSSettings->brand == '2')
@if ($AMSSettings->logo!='')
<img class="navbar-brand-img logo" src="{{ config('app.url') }}/uploads/{{ $AMSSettings->logo }}">
@endif
@else
{{ $AMSSettings->site_name }}
@endif
@else
NEEPCO AMS
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
© {{ date('Y') }} NEEPCO-AMS. All rights reserved.
@endif

@if ($AMSSettings->privacy_policy_link!='')
<a href="{{ $AMSSettings->privacy_policy_link }}">{{ trans('admin/settings/general.privacy_policy') }}</a>
@endif

@endcomponent
@endslot
@endcomponent
