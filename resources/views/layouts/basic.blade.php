<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ ($AMSSettings) && ($AMSSettings->site_name) ? $AMSSettings->site_name : 'NEEPCO AMS' }}</title>

    <link rel="shortcut icon" type="image/ico" href="{{ ($AMSSettings) && ($AMSSettings->favicon!='') ?  Storage::disk('public')->url(e($AMSSettings->favicon)) : config('app.url').'/favicon.ico' }}">
    {{-- stylesheets --}}
    <link rel="stylesheet" href="{{ url(mix('css/dist/all.css')) }}">

    <script nonce="{{ csrf_token() }}">
        window.neepco_ams = {
            settings: {
                "per_page": 50
            }
        };
    </script>


    @if (($AMSSettings) && ($AMSSettings->header_color))
        <style>
        .main-header .navbar, .main-header .logo {
        background-color: {{ $AMSSettings->header_color }};
        background: -webkit-linear-gradient(top,  {{ $AMSSettings->header_color }} 0%,{{ $AMSSettings->header_color }} 100%);
        background: linear-gradient(to bottom, {{ $AMSSettings->header_color }} 0%,{{ $AMSSettings->header_color }} 100%);
        border-color: {{ $AMSSettings->header_color }};
        }
        .skin-blue .sidebar-menu > li:hover > a, .skin-blue .sidebar-menu > li.active > a {
        border-left-color: {{ $AMSSettings->header_color }};
        }
        </style>
    @endif

    @if (($AMSSettings) && ($AMSSettings->custom_css))
        <style>
            {!! $AMSSettings->show_custom_css() !!}
        </style>
    @endif

</head>

<body class="hold-transition login-page">

    @if (($AMSSettings) && ($AMSSettings->logo!=''))
        <div class="text-center">
            <a href="{{ config('app.url') }}">
                <img id="login-logo" src="{{ Storage::disk('public')->url('').e($AMSSettings->logo) }}" alt="{{ $AMSSettings->site_name }}">
            </a>
        </div>
    @endif
  <!-- Content -->
  @yield('content')

    <div class="text-center" style="padding-top: 100px;">
        @if (($AMSSettings) && ($AMSSettings->privacy_policy_link!=''))
        <a target="_blank" rel="noopener" href="{{  $AMSSettings->privacy_policy_link }}" target="_new">{{ trans('admin/settings/general.privacy_policy') }}</a>
    @endif
    </div>

    {{-- Javascript files --}}
    <script src="{{ url(mix('js/dist/all.js')) }}" nonce="{{ csrf_token() }}"></script>


    @stack('js')
</body>

</html>
